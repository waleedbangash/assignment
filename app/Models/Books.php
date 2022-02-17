<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable=[
        'book_title',
        'author',
        'published_year',
        'book_image',
        'rack_id',
    ];
}
