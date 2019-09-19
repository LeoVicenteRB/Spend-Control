<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('users')->insert([
           'name' => 'Admin',
           'cpf' => '33621987835',
           'email' => 'admin@admin',
           'salario' => '1200',
           'password' => Hash::make('admin')
       ]);
    }
}
