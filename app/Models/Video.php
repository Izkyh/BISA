<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'youtube_url'
    ];

    /**
     * Extract YouTube Video ID dari URL
     */
    public function getYoutubeIdAttribute(): ?string
    {
        $url = $this->youtube_url;

        // Pattern untuk berbagai format YouTube URL
        $patterns = [
            '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/',
            '/youtube\.com\/embed\/([a-zA-Z0-9_-]+)/',
            '/youtu\.be\/([a-zA-Z0-9_-]+)/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    /**
     * Get embed URL untuk iframe
     */
    public function getEmbedUrlAttribute(): string
    {
        $videoId = $this->youtube_id;
        return $videoId ? "https://www.youtube.com/embed/{$videoId}" : '';
    }

    /**
     * Get thumbnail URL
     */
    public function getThumbnailUrlAttribute(): string
    {
        $videoId = $this->youtube_id;
        return $videoId ? "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg" : '';
    }

    /**
     * Scope untuk video terbaru
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
