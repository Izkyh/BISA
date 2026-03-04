<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            BoardMemberSeeder::class,
            ArticleSeeder::class,
            EventSeeder::class,
            VideoSeeder::class,
        ]);
    }
}
