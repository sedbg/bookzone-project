<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AccountModel;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // View Account
    function view_account()
    {
        return view('auth/edit');
    }
    // Update Account
    function update_account(Request $req)
    {
        $ifPasswordChange = [];
        if (trim($req->password)) {
            $ifPasswordChange = ['string', 'min:8', 'confirmed'];
        }
        $req->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(Auth::id(), 'id')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id(), 'id')],
            'password' => $ifPasswordChange
        ]);
        $update = AccountModel::find(Auth::id());
        $update->firstname = $req->firstname;
        $update->lastname = $req->lastname;
        $update->email = $req->email;
        $update->username = $req->username;
        if (!empty($req->password)) {
            $update->password = Hash::make($req->password);
        }
        $update->save();
        return back()->with('success', 'Done!');
    }
}
