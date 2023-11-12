<?php

namespace Database\Factories;

use App\Models\Artcile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtcileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artcile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'title' => $this->faker->word,
        'content' => $this->faker->text,
        'cover_image' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
