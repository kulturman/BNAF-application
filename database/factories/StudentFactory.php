<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'name' => $this->faker->word,
            'forename' => $this->faker->word,
            'matricule' => $this->faker->word,
            'birthdate' => $this->faker->word,
            'birthplace' => $this->faker->word,
            'tutor_phone_number1' => $this->faker->word,
            'tutor_phone_number2' => $this->faker->word,
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
