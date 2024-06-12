<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'meta_title',
        'meta_description',
        'is_published',
    ];

    protected $casts = [
        'title' => 'array',
        'slug' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'content' => 'array',
        'published' => 'boolean',
    ];
}
