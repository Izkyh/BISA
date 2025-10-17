<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'start_time',
        'end_time',
        'event_date',
        'location',
        'link',
        'image_path',
    ];

    /**
     * Cast attributes to proper types
     */
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'event_date' => 'date',
    ];

    /**
     * Categories constant
     */
    const CATEGORY_UMUM = 'umum';
    const CATEGORY_KELAS = 'kelas';
    const CATEGORY_SEMINAR = 'seminar';

    /**
     * Get all available categories
     */
    public static function getCategories(): array
    {
        return [
            self::CATEGORY_UMUM => 'Umum',
            self::CATEGORY_KELAS => 'Kelas',
            self::CATEGORY_SEMINAR => 'Seminar',
        ];
    }

    /**
     * Get category label
     */
    public function getCategoryLabelAttribute(): string
    {
        return self::getCategories()[$this->category] ?? ucfirst($this->category);
    }

    /**
     * Get badge color based on category
     */
    public function getCategoryColorAttribute(): string
    {
        return match($this->category) {
            self::CATEGORY_UMUM => 'primary',
            self::CATEGORY_KELAS => 'warning',
            self::CATEGORY_SEMINAR => 'success',
            default => 'secondary',
        };
    }

    /**
     * Scope untuk event mendatang
     */
    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', Carbon::today())
            ->orderBy('event_date', 'asc');
    }

    /**
     * Scope untuk event yang sudah lewat
     */
    public function scopePast($query)
    {
        return $query->where('event_date', '<', Carbon::today())
            ->orderBy('event_date', 'desc');
    }

    /**
     * Scope untuk filter by category
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Check if event is upcoming
     */
    public function isUpcoming(): bool
    {
        return $this->event_date >= Carbon::today();
    }

    /**
     * Check if event is today
     */
    public function isToday(): bool
    {
        return $this->event_date->isToday();
    }

    /**
     * Get formatted date range
     */
    public function getFormattedDateRangeAttribute(): string
    {
        $date = $this->event_date->format('d M Y');
        $startTime = $this->start_time->format('H:i');
        $endTime = $this->end_time->format('H:i');

        return "{$date}, {$startTime} - {$endTime} WIB";
    }

    /**
     * Get formatted event date (Indonesia)
     */
    public function getFormattedDateAttribute(): string
    {
        Carbon::setLocale('id');
        return $this->event_date->translatedFormat('l, d F Y');
    }
}
