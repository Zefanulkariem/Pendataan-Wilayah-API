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
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_umkm');
            $table->string('slug');
            $table->string('koordinat');
            $table->longText('deskripsi');
            $table->string('image')->nullable();
            $table->text('link')->nullable();
            $table->unsignedBigInteger('id_desa');
            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis_umkm');
            $table->foreign('id_jenis_umkm')->references('id')->on('jenis_umkms')->onDelete('cascade');
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
