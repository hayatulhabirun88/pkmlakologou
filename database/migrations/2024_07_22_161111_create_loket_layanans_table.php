<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loket_layanans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_daftar');
            $table->string('kode_layanan');
            $table->bigInteger('pasien_id');
            $table->bigInteger('poli_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loket_layanans');
    }
};
