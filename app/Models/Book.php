<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'author',
        'enabled',
        'user_id',
        'description'
    ];
}
