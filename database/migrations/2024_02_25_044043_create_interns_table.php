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
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->constrained();
            $table->string('email');
            $table->string('name');
            $table->string('phone');
            $table->string('place');
            $table->date('birth');
            $table->text('address');
            $table->char('village_id', 10)->nullable();
            $table->string('instagram');
            $table->string('linkedin');
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interns');
    }
};
