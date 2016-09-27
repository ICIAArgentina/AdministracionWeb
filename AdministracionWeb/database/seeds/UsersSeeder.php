<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//creamos usuario administrador
        DB::table('users')->insert([
            'name' => 'administracion',
            'email' => 'administracion@iciaargentina.com',
            'password' => bcrypt('Mat302820'),
        ]);
    }
}
