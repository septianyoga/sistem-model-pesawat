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
        Schema::create('eboms', function (Blueprint $table) {
            $table->id();
            $table->string('nha');
            $table->integer('no_item');
            $table->string('component');
            $table->string('item_description');
            $table->integer('quantity');
            $table->unsignedBigInteger('trpgmmodel_id')->nullable();
            $table->foreign('trpgmmodel_id')->references('id')->on('trpgmmodel')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eboms');
    }
};
