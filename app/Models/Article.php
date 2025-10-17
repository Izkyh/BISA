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
        'image_path'
    ];

    /**
     * Boot method untuk auto-generate slug
     */
    protected static function booted(): void
    {
        static::creating(function ($article) {
            // Generate slug dari title
            $article->slug = Str::slug($article->title);

            // Pastikan slug unik dengan menambahkan suffix jika duplikat
            $originalSlug = $article->slug;
            $counter = 1;

            while (static::where('slug', $article->slug)->exists()) {
                $article->slug = $originalSlug . '-' . $counter;
                $counter++;
            }
        });

        // Update slug jika title berubah (optional)
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
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

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
