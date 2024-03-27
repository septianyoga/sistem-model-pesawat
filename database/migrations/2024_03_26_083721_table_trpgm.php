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
        Schema::create('trpgm', function (Blueprint $table) {
            $table->id();
            $table->string('c_pgm');
            $table->string('n_pgm');
            $table->char('i_entry');
            $table->date('d_entry');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trpgm');
    }
};
