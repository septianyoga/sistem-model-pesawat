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
        Schema::create('trpon', function (Blueprint $table) {
            $table->string('id_c_pgm_ver')->primary();
            $table->string('c_pgm');
            $table->string('c_pgm_sub');
            $table->string('e_pgm');
            $table->string('c_org_core');
            $table->char('i_entry')->nullable();
            $table->date('d_entry')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trpon');
    }
};
