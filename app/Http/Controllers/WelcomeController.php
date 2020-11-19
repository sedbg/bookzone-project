<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    // Search
    function search()
    {
        $search = $_GET['q'];
        $data = DB::table('books')->where('name', 'like', '%' . $search . '%')->get();
        return view('welcome', ['data' => $data]);
    }
    // Home Page
    function home()
    {
        $data = DB::table('books')->get();
        return view('welcome', ['data' => $data]);
    }
}
