<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // View Book
    function edit($id)
    {
        $data = BookModel::find($id);
        if ($data != null && $data->creator == Auth::id()) {
            return view('book', ['data' => $data]);
        } else {
            return redirect('list');
        }
    }
    // Delete Book
    function delete(Request $req)
    {
        $delete = BookModel::find($req->id);
        if ($delete != null && $delete->creator == Auth::id()) {
            $delete->delete();
        }
        return redirect('list');
    }
    // Update Book
    function update(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'year' => ['required', 'numeric'],
            'description' => 'required',
            'isbn' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $update = BookModel::find($req->id);
        if ($update != null && $update->creator == Auth::id()) {
            $update->name = $req->name;
            $update->year = $req->year;
            $update->description = $req->description;
            $update->isbn = $req->isbn;
            if ($req->file('image')) {
                $file = $req->file('image');
                $req->file('image')->store('images', 'public');
                $update->image = $file->hashName();
            }
            $update->save();
            return back()->with('success', 'Done!');
        } else {
            return redirect('/');
        }
    }
    // Insert Book
    function insert(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'year' => ['required', 'numeric'],
            'description' => 'required',
            'isbn' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);
        $add = new BookModel;
        $add->name = $req->name;
        $add->year = $req->year;
        $add->description = $req->description;
        $add->isbn = $req->isbn;
        $add->creator = Auth::id();
        if ($req->file('image')) {
            $file = $req->file('image');
            $req->file('image')->store('images', 'public');
            $add->image = $file->hashName();
        }
        $add->save();
        return redirect('list');
    }
}
