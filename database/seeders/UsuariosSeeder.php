<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jesus',
            'email' => 'correo@correo.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'type_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Juan',
            'email' => 'correo2@correo.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'type_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Pablo',
            'email' => 'correo3@correo.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'type_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
