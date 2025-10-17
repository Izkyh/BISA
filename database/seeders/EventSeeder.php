<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Belajar Bahasa Isyarat Indonesia untuk Umum',
                'category' => 'umum',
                'start_time' => Carbon::create(2025, 9, 28, 6, 30),
                'end_time' => Carbon::create(2025, 9, 28, 9, 0),
                'event_date' => Carbon::create(2025, 9, 28),
                'location' => 'CFD Taman Bungkul, Surabaya',
                'link' => null,
                'image_path' => null,
            ],
            [
                'title' => 'Seminar & Pelatihan Bisindo: "Bersatu untuk Inklusi"',
                'category' => 'seminar',
                'start_time' => Carbon::create(2025, 9, 27, 12, 0),
                'end_time' => Carbon::create(2025, 9, 27, 16, 0),
                'event_date' => Carbon::create(2025, 9, 27),
                'location' => 'Perpustakaan Bank Indonesia, Surabaya',
                'link' => 'https://forms.gle/example',
                'image_path' => null,
            ],
            [
                'title' => 'Kelas BISINDO Level 1 Batch A3',
                'category' => 'kelas',
                'start_time' => Carbon::create(2025, 10, 5, 14, 0),
                'end_time' => Carbon::create(2025, 10, 5, 16, 0),
                'event_date' => Carbon::create(2025, 10, 5),
                'location' => 'Online (Zoom) & Offline (Sekretariat TIBA)',
                'link' => 'https://forms.gle/example-kelas',
                'image_path' => null,
            ],
            [
                'title' => 'Workshop Bahasa Isyarat untuk Guru',
                'category' => 'seminar',
                'start_time' => Carbon::create(2025, 10, 12, 9, 0),
                'end_time' => Carbon::create(2025, 10, 12, 15, 0),
                'event_date' => Carbon::create(2025, 10, 12),
                'location' => 'Dinas Pendidikan Kota Surabaya',
                'link' => null,
                'image_path' => null,
            ],
            [
                'title' => 'Ngopi Bareng Tuli: Coffee Morning Session',
                'category' => 'umum',
                'start_time' => Carbon::create(2025, 10, 20, 8, 0),
                'end_time' => Carbon::create(2025, 10, 20, 10, 0),
                'event_date' => Carbon::create(2025, 10, 20),
                'location' => 'Kopi Kenangan Tunjungan Plaza',
                'link' => null,
                'image_path' => null,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
