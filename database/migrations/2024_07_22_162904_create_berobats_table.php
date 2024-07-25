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
        Schema::create('berobats', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tgl_berobat');
            $table->bigInteger('dokter_id');
            $table->bigInteger('poli_id');
            $table->bigInteger('pasien_id');
            $table->string('no_ruangan');
            $table->string('pengirim');
            $table->text('diagnosa');
            $table->text('tindak_lanjut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berobats');
    }
};
