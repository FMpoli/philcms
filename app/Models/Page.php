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
        \Log::info('Original content value: ', ['value' => $value]);

        if (empty($value)) {
            return [];
        }

        $content = is_string($value) ? json_decode($value, true) : $value;

        \Log::info('Decoded content value: ', ['content' => $content]);

        if (is_array($content)) {
            foreach ($content as $key => &$langContent) {
                \Log::info('Lang content value before processing: ', ['key' => $key, 'langContent' => $langContent]);

                if (is_string($langContent)) {
                    $langContent = json_decode($langContent, true);
                }

                if (isset($langContent['data']['video']) && !is_array($langContent['data']['video'])) {
                    $langContent['data']['video'] = [$langContent['data']['video']];
                }

                if (!is_array($langContent)) {
                    $langContent = [$langContent];
                }

                \Log::info('Lang content value after processing: ', ['key' => $key, 'langContent' => $langContent]);
            }
        }

        return $content;
    }

    public function setContentAttribute($value)
    {
        \Log::info('Original set content value: ', ['value' => $value]);

        if (empty($value)) {
            $this->attributes['content'] = json_encode([]);
            return;
        }

        $content = is_string($value) ? json_decode($value, true) : $value;

        \Log::info('Decoded set content value: ', ['content' => $content]);

        if (is_array($content)) {
            foreach ($content as $key => &$langContent) {
                \Log::info('Set lang content value before processing: ', ['key' => $key, 'langContent' => $langContent]);

                if (is_string($langContent)) {
                    $langContent = json_decode($langContent, true);
                }

                if (isset($langContent['data']['video']) && !is_array($langContent['data']['video'])) {
                    $langContent['data']['video'] = [$langContent['data']['video']];
                }

                if (!is_array($langContent)) {
                    $langContent = [$langContent];
                }

                \Log::info('Set lang content value after processing: ', ['key' => $key, 'langContent' => $langContent]);
            }
        }

        $this->attributes['content'] = json_encode($content);
        \Log::info('Final set content value: ', ['content' => $this->attributes['content']]);
    }
}