<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            // ── PAST EVENTS (2025) ─────────────────────────────────
            [
                'title'      => 'Belajar Bahasa Isyarat Indonesia untuk Umum',
                'category'   => 'umum',
                'start_time' => Carbon::create(2025, 9, 28, 6, 30),
                'end_time'   => Carbon::create(2025, 9, 28, 9, 0),
                'event_date' => Carbon::create(2025, 9, 28),
                'location'   => 'CFD Taman Bungkul, Surabaya',
                'link'       => null,
                'image_path' => null,
            ],
            [
                'title'      => 'Seminar & Pelatihan Bisindo: "Bersatu untuk Inklusi"',
                'category'   => 'seminar',
                'start_time' => Carbon::create(2025, 9, 27, 12, 0),
                'end_time'   => Carbon::create(2025, 9, 27, 16, 0),
                'event_date' => Carbon::create(2025, 9, 27),
                'location'   => 'Perpustakaan Bank Indonesia, Surabaya',
                'link'       => 'https://forms.gle/example',
                'image_path' => null,
            ],
            [
                'title'      => 'Kelas BISINDO Level 1 Batch A3',
                'category'   => 'kelas',
                'start_time' => Carbon::create(2025, 10, 5, 14, 0),
                'end_time'   => Carbon::create(2025, 10, 5, 16, 0),
                'event_date' => Carbon::create(2025, 10, 5),
                'location'   => 'Online (Zoom) & Offline (Sekretariat TIBA)',
                'link'       => 'https://forms.gle/example-kelas',
                'image_path' => null,
            ],
            [
                'title'      => 'Workshop Bahasa Isyarat untuk Guru',
                'category'   => 'seminar',
                'start_time' => Carbon::create(2025, 11, 12, 9, 0),
                'end_time'   => Carbon::create(2025, 11, 12, 15, 0),
                'event_date' => Carbon::create(2025, 11, 12),
                'location'   => 'Dinas Pendidikan Kota Surabaya',
                'link'       => null,
                'image_path' => null,
            ],
            [
                'title'      => 'Ngopi Bareng Tuli: Coffee Morning Session',
                'category'   => 'umum',
                'start_time' => Carbon::create(2025, 12, 20, 8, 0),
                'end_time'   => Carbon::create(2025, 12, 20, 10, 0),
                'event_date' => Carbon::create(2025, 12, 20),
                'location'   => 'Kopi Kenangan Tunjungan Plaza, Surabaya',
                'link'       => null,
                'image_path' => null,
            ],

            // ── UPCOMING EVENTS (2026) ──────────────────────────────
            [
                'title'      => 'Kelas BISINDO Level 1 Batch A4 — Maret 2026',
                'category'   => 'kelas',
                'start_time' => Carbon::create(2026, 3, 15, 14, 0),
                'end_time'   => Carbon::create(2026, 3, 15, 16, 30),
                'event_date' => Carbon::create(2026, 3, 15),
                'location'   => 'Sekretariat TIBA Surabaya & Zoom Online',
                'link'       => 'https://forms.gle/daftar-kelas-maret',
                'image_path' => null,
            ],
            [
                'title'      => 'Seminar Inklusi Digital untuk Komunitas Tuli',
                'category'   => 'seminar',
                'start_time' => Carbon::create(2026, 3, 22, 9, 0),
                'end_time'   => Carbon::create(2026, 3, 22, 13, 0),
                'event_date' => Carbon::create(2026, 3, 22),
                'location'   => 'Gedung DPRD Kota Surabaya',
                'link'       => 'https://forms.gle/seminar-inklusi-digital',
                'image_path' => null,
            ],
            [
                'title'      => 'Aksi Sosial TIBA: Bahasa Isyarat di Car Free Day',
                'category'   => 'umum',
                'start_time' => Carbon::create(2026, 4, 5, 6, 0),
                'end_time'   => Carbon::create(2026, 4, 5, 9, 0),
                'event_date' => Carbon::create(2026, 4, 5),
                'location'   => 'CFD Darmo, Surabaya',
                'link'       => null,
                'image_path' => null,
            ],
            [
                'title'      => 'Kelas BISINDO Level 2 — April 2026',
                'category'   => 'kelas',
                'start_time' => Carbon::create(2026, 4, 12, 14, 0),
                'end_time'   => Carbon::create(2026, 4, 12, 16, 30),
                'event_date' => Carbon::create(2026, 4, 12),
                'location'   => 'Sekretariat TIBA Surabaya',
                'link'       => 'https://forms.gle/daftar-level2-april',
                'image_path' => null,
            ],
            [
                'title'      => 'Pelatihan Interpreter Bahasa Isyarat',
                'category'   => 'seminar',
                'start_time' => Carbon::create(2026, 5, 10, 8, 0),
                'end_time'   => Carbon::create(2026, 5, 10, 17, 0),
                'event_date' => Carbon::create(2026, 5, 10),
                'location'   => 'Hotel Swiss-Belinn Surabaya',
                'link'       => 'https://forms.gle/pelatihan-interpreter',
                'image_path' => null,
            ],
            [
                'title'      => 'Community Gathering TIBA Surabaya 2026',
                'category'   => 'umum',
                'start_time' => Carbon::create(2026, 6, 7, 16, 0),
                'end_time'   => Carbon::create(2026, 6, 7, 21, 0),
                'event_date' => Carbon::create(2026, 6, 7),
                'location'   => 'Taman Surya, Balai Kota Surabaya',
                'link'       => 'https://forms.gle/gathering-tiba-2026',
                'image_path' => null,
            ],
        ];

        foreach ($events as $event) {
            Event::firstOrCreate(
                ['title' => $event['title'], 'event_date' => $event['event_date']],
                $event
            );
        }
    }
}
