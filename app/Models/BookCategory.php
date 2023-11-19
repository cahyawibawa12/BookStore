<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;
    protected $table = 'tb_books_category';

    protected $fillable = [
        'category_name'
    ];

    public function book_categories()
    {
        return $this->hasMany(Book::class);
    }
}
