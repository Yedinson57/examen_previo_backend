<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profesors_modulos', function (Blueprint $table) {
            $table->id();

            //Llave foranea profesor
            $table->unsignedBigInteger('profesor_id')->nullable();

            $table->foreign('profesor_id')
                ->references('id')
                ->on('profesors')
                ->onDelete('set null')
                ->onUpdate('set null');

            //Llave foranea modulo
            $table->unsignedBigInteger('modulo_id')->nullable();

            $table->foreign('modulo_id')
                ->references('id')
                ->on('modulos')
                ->onDelete('set null')
                ->onUpdate('set null');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesors_modulos');
    }
};
