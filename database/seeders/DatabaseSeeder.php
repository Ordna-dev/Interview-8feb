<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Task;
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
        // Crear 10 compañías
        Company::factory(10)->create();

        // Crear 10 usuarios (y mantener el usuario de prueba)
        User::factory(10)->create();

        // Crear 50 tareas
        Task::factory(50)->create();
    }
}
