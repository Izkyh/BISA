<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use App\Models\Event;
use App\Models\Video;
use App\Models\BoardMember;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ArticleSeeder::class,
            VideoSeeder::class,
            EventSeeder::class,
        ]);

        if (!User::where('email', 'admin@tibasurabaya.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@tibasurabaya.com',
                'password' => bcrypt('password'),
            ]);
        }

        User::factory(5)->create();
        Article::factory(10)->create();
        Event::factory(5)->create();
        Video::factory(5)->create();
        BoardMember::factory()->create([
            'name' => 'Ketua',
            'position' => 'Ketua Umum',
        ]);
        BoardMember::factory(4)->create();
    }
}
