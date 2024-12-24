<?php

use Carbon\Carbon;
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
        Schema::create('talent', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('place');
            $table->date('date')->default(Carbon::now()->toDateString());
            $table->char('village_id', 10)->nullable();
            $table->string('instagram');
            $table->string('engagement');
            $table->bigInteger('finstagram');
            $table->decimal('rate_igs', 16, 2);
            $table->decimal('rate_igf', 16, 2);
            $table->decimal('rate_igr', 16, 2);
            $table->decimal('rate_igl', 16, 2);
            $table->string('tiktok');
            $table->bigInteger('ftiktok');
            $table->decimal('rate_ttf', 16, 2);
            $table->decimal('rate_ttl', 16, 2);
            $table->string('youtube');
            $table->bigInteger('syoutube');
            $table->decimal('rate_yt', 16, 2);
            $table->decimal('rate_event', 16, 2);
            $table->boolean('talent_exclusive');
            $table->foreignId('staff_id')->nullable();
            $table->boolean('shopee_affiliate');
            $table->boolean('tiktok_affiliate');
            $table->boolean('mcn_tiktok');            
            $table->string('photo')->default('images/default-profile-picture.jpg');
            $table->boolean('status')->default(false);
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('npwp')->nullable();
            $table->string('nik')->nullable();
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
        Schema::dropIfExists('talent');
    }
};
