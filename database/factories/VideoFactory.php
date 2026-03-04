<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5),
            'youtube_url' => 'https://youtu.be/' . $this->faker->lexify(str_repeat('?', 11)),
        ];
    }
}
