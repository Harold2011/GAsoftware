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
        Schema::create('afirmacion', function (Blueprint $table) {
            $table->id();
            $table->string('name', 320);
            $table->unsignedBigInteger('desempeno_id')->unsigned();            
            $table->foreign('desempeno_id')->references('id')->on('desempeno')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afirmacion');
    }
};
