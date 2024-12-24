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
        Schema::create('earning_sow', function (Blueprint $table) {
            $table->foreignId('earning_id')->constrained()->onDelete('cascade');
            $table->foreignId('sow_id')->constrained();
            $table->decimal('talent_rate', 16, 2);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earning_sow');
    }
};
