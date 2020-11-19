<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function list()
    {
        $data = DB::table('books')->where('creator', Auth::id())->get();
        return view('books', ['data' => $data]);
    }
}
