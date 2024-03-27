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
            $table->id();
            $table->unsignedBigInteger('trpgm_id')->nullable()->references('id')->on('trpgm')->onDelete('set null');
            $table->foreign('trpgm_id')->references('id')->on('trpgm')->onDelete('set null');
            $table->unsignedBigInteger('trpgmsub_id')->nullable()->references('id')->on('trpgmsub')->onDelete('set null');
            $table->foreign('trpgmsub_id')->references('id')->on('trpgmsub')->onDelete('set null');
            $table->unsignedBigInteger('trpon_id')->nullable()->references('id')->on('trpon')->onDelete('set null');
            $table->foreign('trpon_id')->references('id')->on('trpon')->onDelete('set null');
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
