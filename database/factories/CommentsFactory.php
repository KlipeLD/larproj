<?php

namespace Database\Factories;

use App\Models\Comments;
use App\Models\Articles;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ids = Articles::pluck('id')->toArray();

        $fakedate = $this->faker->date('Y-m-d','now');
        return [
            'articles_id' =>  $this->faker->randomElement($ids),
            'subject' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'created_at' => $fakedate,
            'updated_at' => $fakedate
        ];
    }
}
