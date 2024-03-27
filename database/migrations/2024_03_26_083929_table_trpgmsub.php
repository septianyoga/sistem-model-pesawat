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
        Schema::create('trpgmsub', function (Blueprint $table) {
            $table->string('id_c_pgm_sub')->primary();
            $table->string('n_pgm_sub');
            $table->char('i_entry')->nullable();
            $table->date('d_entry');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trpgmsub');
    }
};
