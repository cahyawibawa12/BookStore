<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'tb_authors';

    protected $fillable = [
        'name'
    ];

    public function authors()
    {
        return $this->hasMany(Book::class, 'author_id','id');
    }
}
