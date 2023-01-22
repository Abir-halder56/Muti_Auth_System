<?php

namespace Database\Seeders;

use App\Models\Employeer;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employeer::create([
            'name' => 'Hardik',
            'email' => 'hardik@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
