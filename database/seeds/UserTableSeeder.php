<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('personal')->insert([
          'nombre' => 'admin',
          'paterno' => 'admin',
          'materno' => 'admin',
          'direccion' => 'direccion',
          'telefono' => '123123',
          'fecha_nacimiento' =>Carbon::parse('2000-01-01')
      ]);
      DB::table('users')->insert([
          'email' => 'admin@gmail.com',
          'password' => bcrypt('123123'),
          'id_personal' => '1'
      ]);
    }
}
