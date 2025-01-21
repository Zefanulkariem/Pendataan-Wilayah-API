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
        Schema::create('bukti_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_keuangan');
            $table->foreign('id_keuangan')->references('id')->on('keuangans')->onDelete('cascade');
            $table->string('gambar_bukti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_transaksis');
    }
};
