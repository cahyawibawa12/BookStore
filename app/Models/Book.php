<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'tb_books';

    protected $fillable = [
        'title', 'author_id', 'category_id'
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function book_category(){
        return $this->belongsTo(BookCategory::class);
    }

    public function books()
    {
        return $this->hasMany(Rating::class);
    }
}
