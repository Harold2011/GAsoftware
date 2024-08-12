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
        Schema::create('desempeno', function (Blueprint $table) {
            $table->id();
            $table->string('name', 320);
            $table->unsignedBigInteger('competencia_id')->unsigned();            
            $table->foreign('competencia_id')->references('id')->on('competencia')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desempeno');
    }
};
