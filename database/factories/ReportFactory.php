<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'localite' => $this->faker->word,
        'validated' => $this->faker->word,
        'structure' => $this->faker->word,
        'photo' => $this->faker->word,
        'photoInput' => $this->faker->word,
        'text' => $this->faker->text,
        'repere' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'nip' => $this->faker->word,
        'region' => $this->faker->word,
        'province' => $this->faker->word,
        'commune' => $this->faker->word
        ];
    }
}
