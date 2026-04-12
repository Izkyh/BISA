<?php
// app/Models/Article.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image_path',
        'views',
    ];

    /**
     * Boot method untuk auto-generate slug
     */
    protected static function booted(): void
    {
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);

            $originalSlug = $article->slug;
            $counter = 1;

            while (static::where('slug', $article->slug)->exists()) {
                $article->slug = $originalSlug . '-' . $counter;
                $counter++;
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title') && !$article->isDirty('slug')) {
                $article->slug = Str::slug($article->title);

                $originalSlug = $article->slug;
                $counter = 1;

                while (static::where('slug', $article->slug)
                    ->where('id', '!=', $article->id)
                    ->exists()) {
                    $article->slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }
        });
    }

    /**
     * Get route key name for route model binding
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Scope untuk artikel terbaru
     */

    /**
     * Scope untuk artikel populer (berdasarkan created_at)
     */
    public function scopePopular($query, $limit = 5)
    {
        return $query->orderBy('created_at', 'desc')->limit($limit);
    }

    /**
     * Accessor untuk formatted created_at
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('d M Y');
    }

    /**
     * Accessor untuk excerpt pendek
     */
    public function getShortExcerptAttribute(): string
    {
        return Str::limit($this->excerpt, 100);
    }
}
