<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'meta_title',
        'meta_description',
        'is_published',
    ];

    public $translatable = [
        'title',
        'slug',
        'content',
        'description',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'title' => 'array',
        'slug' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'published' => 'boolean',
    ];

    public function getContentAttribute($value)
    {
        if (empty($value)) {
            return [];
        }

        $content = is_string($value) ? json_decode($value, true) : $value;

        if (is_array($content)) {
            foreach ($content as $key => &$langContent) {

                if (is_string($langContent)) {
                    $langContent = json_decode($langContent, true);
                }

                if (isset($langContent['data']['video']) && !is_array($langContent['data']['video'])) {
                    $langContent['data']['video'] = [$langContent['data']['video']];
                }

                if (!is_array($langContent)) {
                    $langContent = [$langContent];
                }

            }
        }

        return $content;
    }

    // public function setContentAttribute($value)
    // {
    //     if (empty($value)) {
    //         $this->attributes['content'] = json_encode([]);
    //         return;
    //     }

    //     $content = is_string($value) ? json_decode($value, true) : $value;

    //     if (is_array($content)) {
    //         foreach ($content as $key => &$langContent) {

    //             if (is_string($langContent)) {
    //                 $langContent = json_decode($langContent, true);
    //             }

    //             if (isset($langContent['data']['video']) && !is_array($langContent['data']['video'])) {
    //                 $langContent['data']['video'] = [$langContent['data']['video']];
    //             }

    //             if (!is_array($langContent)) {
    //                 $langContent = [$langContent];
    //             }
    //         }
    //     }

    //     $this->attributes['content'] = json_encode($content);
    // }

    /**
     * Get the options for generating the slug.
     */
    // public function getSlugOptions() : SlugOptions
    // {
    //     return SlugOptions::create()
    //         ->generateSlugsFrom('title')
    //         ->saveSlugsTo('slug');
    // }

}
