<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps  = false;

    public function books()
    {
        return $this->belongsToMany(
            Books::class,
            'book_tag',
            'tag_id',
            'book_id',
            'id',
            'id'
        );
    }
}
