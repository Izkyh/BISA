<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BoardMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'type',
        'birth_date',
        'gender',
        'occupation',
        'address',
        'phone',
        'social_media',
        'photo_path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFounder($query)
    {
        return $query->where('type', 'founder');
    }

    public function scopeBoard($query)
    {
        return $query->where('type', 'board');
    }

    public function scopeMember($query)
    {
        return $query->where('type', 'member');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('name', 'asc');
    }

    // Accessors
    public function getPhotoUrlAttribute()
    {
        if ($this->photo_path) {
            return asset('images/' . $this->photo_path);
        }
        return asset('foto/placeholder.jpg');
    }

    public function getAgeAttribute()
    {
        if ($this->birth_date) {
            return Carbon::parse($this->birth_date)->age;
        }
        return null;
    }
}
