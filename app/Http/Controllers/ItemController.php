<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;

class ItemController extends Controller
{
    function item($id)
    {
        $data = ItemModel::find($id);
        if ($data != null) {
            return view('item', ['data' => $data]);
        } else {
            return redirect('/');
        }
    }
}
