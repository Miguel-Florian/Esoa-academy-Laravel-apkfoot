<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructeurs', function (Blueprint $table) {
            $table->id();
            $table->integer("id_user");
            $table->string("nom");
            $table->string("prenom");
            $table->string('email')->unique()->nullable();
            $table->string("adresse");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instructeurs');
    }
}
