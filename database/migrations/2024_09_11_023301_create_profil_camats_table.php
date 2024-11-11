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
        Schema::create('profil_camats', function (Blueprint $table) {
            $table->id();
            // $table->string('nama_camat');
            // $table->unsignedBigInteger('id_kecamatan');
            // $table->foreign('id_kecamatan')->references('id')->on('kecamatans')->onDelete('cascade');
            // $table->string('cover');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_camats');
    }
};
