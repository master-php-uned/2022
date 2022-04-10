<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Indicamos los seeders a ejecutar
        $this->call(TypeUsersSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
