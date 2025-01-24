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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_investor');
            $table->foreign('id_investor')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_umkm');
            $table->foreign('id_umkm')->references('id')->on('users')->onDelete('cascade');
            $table->string('judul');
            $table->text('lokasi_meeting');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
