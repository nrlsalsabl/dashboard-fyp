<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('link')->nullable()->after('Keterangan');
        });
    }
    
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
    
};
