<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' =>$this->faker->unique()->numberBetween(1,1000),
            'employee_name' =>$this->faker->name(),
            'age' =>mt_rand(23, 60),
            'join_date' =>$this->faker->dateTime(),
            'salary' =>mt_rand(50000,150000),
            'bonus' =>$this->faker->randomFloat(2, 100, 5000),
            'medical_claim' =>mt_rand(500,2000),
            'allowances' =>mt_rand(500,2000),
            'leave_payment' =>mt_rand(100,2000),
        ];
    }
}
