<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title', 'link', 'open_in_new_tab'];

    protected $casts = [
        'open_in_new_tab' => 'boolean',
    ];
}
