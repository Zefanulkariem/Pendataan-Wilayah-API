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
        Schema::create('pelaku_umkms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('kontak');
            $table->unsignedBigInteger('id_desa');
            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
            $table->unsignedBigInteger('id_kelengkapan_legalitas_usaha')->nullable();
            $table->foreign('id_kelengkapan_legalitas_usaha')->references('id')->on('kelengkapan_legalitas_usahas')->onDelete('cascade');
            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaku_umkms');
    }
};
