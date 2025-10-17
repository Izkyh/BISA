<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'title' => '10 Tips Efektif Mempelajari Bahasa Isyarat',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'title' => 'Tips Cepat Belajar BISINDO',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'title' => 'Belajar Sambil Praktik Langsung',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'title' => 'Berkomunikasi Tanpa Batas',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'title' => 'Alfabet Jari BISINDO A-Z',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'title' => 'Kosakata Sehari-hari dalam BISINDO',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'title' => 'Memahami Tata Bahasa BISINDO',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            ],
            [
                'title' => 'Profil Komunitas TIBA Surabaya',
                'youtube_url' => 'https://www.youtube.com/watch?v=qBtYl9oxbKw',
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
