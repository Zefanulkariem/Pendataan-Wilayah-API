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
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_umkm');
            $table->foreign('id_umkm')->references('id')->on('users')->onDelete('cascade');
            $table->string('bulan');
            $table->integer('tahun');
            $table->integer('income');
            $table->integer('outcome');
            $table->integer('profit_loss');
            $table->string('status');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
