<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->text(20),
            'director' => $this->faker->text(20),
            'image_url' => 'https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/512x512/plain/film.png',
            'duration' => $this->faker->numberBetween(3.300),
            'release_date' => $this->faker->date('Y-m-d', 'now'),
            'genre' => $this->faker->word
        ];
    }
}
