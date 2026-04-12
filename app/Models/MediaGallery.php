<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'year',
        'month',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('images/' . $this->image_path);
    }
}
