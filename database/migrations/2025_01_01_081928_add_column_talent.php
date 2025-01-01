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
        Schema::table('talent', function (Blueprint $table) {
            $table->string('domicile');
            $table->text('category');
            $table->string('pic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('talent', function (Blueprint $table) {
           $table->dropColumn('domicile');
           $table->dropColumn('category');
           $table->dropColumn('pic');
        });
    }
};
