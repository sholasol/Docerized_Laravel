<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //call the factory
        $max = 200;

        for($i=0; $i<= $max; $i++)
        {
            Employee::factory()->create();
        }

        //Employee::factory(200)->create();
    }
}
