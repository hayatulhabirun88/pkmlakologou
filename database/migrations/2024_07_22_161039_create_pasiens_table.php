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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pasien')->unique();
            $table->bigInteger('nik')->unique();
            $table->string('nama_pasien');
            $table->enum('jenis_kelamin', ['Perempuan', 'Laki-laki']);
            $table->string('golongan_darah');
            $table->bigInteger('umur')->nullable();
            $table->text('alamat')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_pasien', ['Umum', 'BPJS']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
