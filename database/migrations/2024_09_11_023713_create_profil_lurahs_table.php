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
        Schema::create('profil_lurahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lurah');
            $table->unsignedBigInteger('id_desa');
            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
            $table->string('cover');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_lurahs');
    }
};
