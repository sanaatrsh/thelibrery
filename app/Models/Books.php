<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'book_tag',
            'book_id',
            'tag_id',
            'id',
            'id'
        );
    }
    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'book_student',
            'book_id',
            'student_id',
            'id',
            'id'
        );
    }
}
