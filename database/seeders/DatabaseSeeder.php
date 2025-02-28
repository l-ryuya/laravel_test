<?php

namespace Database\Seeders;

use App\Models\EndUser;
use App\Models\Staff;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Staff::factory(10)->create();
        EndUser::factory(10)->create();
    }
}
