<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    

    use HasFactory;

    public function books()
    {
        return $this->belongsToMany(
            Books::class,
            'book_student',
            'student_id',
            'book_id',
            'id',
            'id'
        );
    }
}
