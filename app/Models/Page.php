<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'builder',
        'description',
        'meta_title',
        'meta_description',
        'published',
    ];

    protected $casts = [
        'builder' => 'array',
        'published' => 'boolean',
    ];
}
