<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('fecha');
            $table->longtext('descripcion');
            $table->timestamps();
            $table->unsignedBigInteger('id_an')->nullable();
            $table->unsignedBigInteger('id_us')->nullable();
            $table->foreign('id_an')->references('id')->on('ancianos')->onDelete('set null')->onDelete('cascade');
            $table->foreign('id_us')->references('id')->on('users')->onDelete('set null')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividas');
    }
}
