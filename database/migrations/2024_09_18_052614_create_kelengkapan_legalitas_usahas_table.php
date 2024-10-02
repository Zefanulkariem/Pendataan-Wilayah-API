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
        Schema::create('kelengkapan_legalitas_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('akta_pendirian'); //belum migrate nullable
            $table->integer('NIB');
            $table->string('SKDP');
            $table->integer('NPWP');
            $table->string('SIUP');
            $table->string('TDP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelengkapan_legalitas_usahas');
    }
};
