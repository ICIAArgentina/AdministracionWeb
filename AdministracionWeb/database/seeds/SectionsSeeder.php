<?php

use Illuminate\Database\Seeder;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'title' => 'Galer&iacute;a',
            'link' => 'gallery'
        ]);

        DB::table('sections')->insert([
            'title' => 'Acerca de Nosotros',
            'link' => 'about'
        ]);

        DB::table('sections')->insert([
            'title' => 'Contacto',
            'link' => 'contact'
        ]);

        DB::table('sections')->insert([
            'title' => 'Fundaci&oacute;n',
            'link' => 'fundacion'
        ]);
    }
}
