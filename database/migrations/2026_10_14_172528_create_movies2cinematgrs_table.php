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
        Schema::create('movies2cinematgrs', function (Blueprint $table) {
            $table->unsignedMediumInteger('movieid')->index('movies2cinematgrs_movieid');
            $table->unsignedMediumInteger('cinematid')->index('movies2cinematgrs_cinematid');
            $table->text('addition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies2cinematgrs');
    }
};
