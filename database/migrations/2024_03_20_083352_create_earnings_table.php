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
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->morphs('earnable'); // brand, agency
            $table->foreignId('talent_id')->constrained();
            $table->string('name');
            $table->date('date');
            $table->decimal('rate', 16, 2)->default(0);
            // $table->decimal('fee_for_talent', 16, 2)->default(0);
            $table->enum('status', ['proses', 'selesai', 'gagal'])->default('proses');
            $table->text('note')->nullable();
            $table->string('link_project')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earnings');
    }
};
