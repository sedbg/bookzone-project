<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    protected $table = 'books';
    protected $guarded = [];
    protected $fillable = [
        'name', 'isbn', 'year', 'description', 'image'
    ];
}
