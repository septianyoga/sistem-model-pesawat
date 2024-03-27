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
        Schema::table('trpgmmodel', function (Blueprint $table) {
            //
            // Drop the existing column
            $table->dropColumn('i_entry');

            // Add the new column
            $table->unsignedBigInteger('user_id')->nullable()->after('n_pgm_model');

            // Add foreign key constraint to 'users' table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trpgmmodel', function (Blueprint $table) {
            //
            // Drop the foreign key constraint
            $table->dropForeign(['user_id']);

            // Drop the new column
            $table->dropColumn('user_id');

            // Re-add the 'i_entry' column
            $table->char('i_entry');
        });
    }
};
