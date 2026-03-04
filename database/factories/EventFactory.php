<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $end = (clone $start)->modify('+2 hours');
        return [
            'title' => $this->faker->sentence(4),
            'category' => $this->faker->randomElement(['umum', 'kelas', 'seminar']),
            'start_time' => $start,
            'end_time' => $end,
            'event_date' => $start->format('Y-m-d'),
            'location' => $this->faker->city(),
            'link' => $this->faker->url(),
            'image_path' => null,
        ];
    }
}
