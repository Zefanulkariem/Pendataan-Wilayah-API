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
        Schema::create('lokasi_umkms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelaku_umkm');
            $table->foreign('id_pelaku_umkm')->references('id')->on('pelaku_umkms')->onDelete('cascade');
            $table->string('nama_umkm');
            $table->string('slug');
            $table->string('koordinat');
            $table->longText('deskripsi');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_umkms');
    }
};
