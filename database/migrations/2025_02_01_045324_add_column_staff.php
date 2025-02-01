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
        Schema::table('staff', function (Blueprint $table) {
            $table->char('regency_id', 4)->nullable();

            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            Schema::table('talent', function (Blueprint $table) {
                $table->dropForeign(['regency_id']);
                
                $table->dropColumn('regency_id');
            });
        });
    }
};
