<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoritesModel extends Model
{
    protected $table = 'favorites';
    protected $guarded = [];

    protected $fillable = [
        'user_id', 'book_id'
    ];
}
