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
        // 'content' => 'array', // Mantieni commentata questa riga
        'published' => 'boolean',
    ];

    // Definiamo un accessor per il campo 'content'
    public function getContentAttribute($value)
    {
        \Log::info('Original content value: ', ['value' => $value]);

        if (empty($value)) {
            return null;
        }

        $content = is_string($value) ? json_decode($value, true) : $value;

        \Log::info('Decoded content value: ', ['content' => $content]);

        if (is_array($content) || is_object($content)) {
            foreach ($content as $key => &$langContent) {
                \Log::info('Lang content value before processing: ', ['key' => $key, 'langContent' => $langContent]);

                if (is_string($langContent) && !empty($langContent)) {
                    $langContent = json_decode($langContent, true);
                }

                if (!is_array($langContent) && !is_object($langContent)) {
                    $langContent = [$langContent];
                }

                \Log::info('Lang content value after processing: ', ['key' => $key, 'langContent' => $langContent]);
            }
        }

        return $content;
    }

    // Definiamo un mutator per il campo 'content'
    public function setContentAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['content'] = null;
            return;
        }

        $content = is_string($value) ? json_decode($value, true) : $value;

        if (is_array($content) || is_object($content)) {
            foreach ($content as $key => &$langContent) {
                if (is_string($langContent) && !empty($langContent)) {
                    $langContent = json_decode($langContent, true);
                }

                if (!is_array($langContent) && !is_object($langContent)) {
                    $langContent = [$langContent];
                }
            }
        }

        $this->attributes['content'] = json_encode($content);
    }
}