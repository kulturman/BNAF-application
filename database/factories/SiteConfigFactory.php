<?php

namespace Database\Factories;

use App\Models\SiteConfig;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteConfigFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteConfig::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'director_word' => $this->faker->text,
            'director_photo' => $this->faker->word,
            'director_name' => $this->faker->word,
            'phone' => $this->faker->word,
            'email' => $this->faker->word,
            'address' => $this->faker->word,
            'facebook' => $this->faker->word,
            'linkedin' => $this->faker->word,
            'twitter' => $this->faker->word,
            'youtube' => $this->faker->word,
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
