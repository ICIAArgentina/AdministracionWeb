<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //si section_id = 0 es una sección principal, de otro modo es
            //parte de alguna seccion (se mostraría como un submenú)
            $table->integer('section_id')->unsigned()->default(0);
            $table->string('title', 50);
            $table->string('link', 100);
            $table->string('link_type', 10)->default('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
