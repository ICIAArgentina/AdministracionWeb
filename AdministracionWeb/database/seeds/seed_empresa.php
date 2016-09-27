<?php

use Illuminate\Database\Seeder;

class seed_empresa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//creamos usuario administrador
        DB::table('empresa')->insert([
            'nombre' => 'ICIA - Tu Hogar de Paz',
            'email' => 'administracion@iciaargentina.com',
            'direccion' => '520 Nª348, Tolosa, La Plata, Buenos Aires, Argentina',
            'telefono1' => '+549-221-5882060'
        ]);
    }
}
