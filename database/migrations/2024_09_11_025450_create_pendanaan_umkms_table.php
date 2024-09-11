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
        Schema::create('pendanaan_umkms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelaku_umkm');
            $table->foreign('id_pelaku_umkm')->references('id')->on('pelaku_umkms')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('jumlah_dana');
            $table->date('tanggal_dana');
            $table->enum('status_pendanaan', ['Tertunda', 'Disetujui', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendanaan_umkms');
    }
};
