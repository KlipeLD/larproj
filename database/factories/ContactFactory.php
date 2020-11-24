<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakedate = $this->faker->date('Y-m-d','now');
        return [
            'name' => $this->faker->sentence,
            'tel' => $this->faker->phoneNumber,
            'body' => $this->faker->paragraph,
            'created_at' => $fakedate,
            'updated_at' => $fakedate
        ];
    }
}
