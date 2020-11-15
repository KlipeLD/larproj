<?php

namespace Database\Factories;

use App\Models\Articles;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $fakedate = $this->faker->date('Y-m-d','now');
        return [
            'user_id' => '1',
            'title' => $title,
            'slug' => str_slug($title),
            'short_body' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'created_at' => $fakedate,
            'updated_at' => $fakedate
        ];
    }
}
