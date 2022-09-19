<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            
            $table->id();
            $table->string('numero',3);
            $table->bigInteger('idPiso')->unsigned();
            $table->bigInteger('idCategoria')->unsigned();
            $table->text('descripcion');
            $table->float('precio');
            $table->string('estado');
            $table->timestamps();
            $table->string('created_by')->nullable();
            $table->string('edited_by')->nullable();
            $table->string('ip_address')->nullable();
            $table->foreign('idPiso')->references('id')->on('pisos')->onDelete('cascade');
            $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitacion');
    }
};
