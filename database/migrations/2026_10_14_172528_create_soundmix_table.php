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
        Schema::create('soundmix', function (Blueprint $table) {
            $table->unsignedMediumInteger('movieid')->index('soundmix_movieid');
            $table->text('sound')->index('soundmix_sound');
            $table->text('addition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soundmix');
    }
};
