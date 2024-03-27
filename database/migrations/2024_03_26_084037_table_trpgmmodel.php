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
        Schema::create('trpgmmodel', function (Blueprint $table) {
            $table->unsignedBigInteger('id_c_pgm_pon')->index(); // Menambahkan indeks di kolom referensi
            // $table->foreign('id_c_pgm_pon')->references('id_c_pon')->on('trpon'); // Merujuk ke primary key 'id'
            $table->string('c_pgm');
            $table->foreign('c_pgm')->references('id_c_pgm')->on('trpgm');
            $table->string('c_pgm_sub');
            $table->foreign('c_pgm_sub')->references('id_c_pgm_sub')->on('trpgmsub');
            $table->string('c_pgm_ver');
            $table->foreign('c_pgm_ver')->references('id_c_pgm_ver')->on('trpon'); // Mengubah referensi ke kolom 'c_pgm_ver'
            $table->char('c_pgm_model');
            $table->char('i_part_nha');
            $table->string('n_pgm_model');
            $table->char('i_entry');
            $table->date('d_entry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trpgmmodel');
    }
};
