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
        Schema::create('competencia', function (Blueprint $table) {
            $table->id();
            $table->string('name', 320);
            $table->unsignedBigInteger('estandar_id')->unsigned();            
            $table->foreign('estandar_id')->references('id')->on('estandar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencia');
    }
};
