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
        Schema::create('akatitles', function (Blueprint $table) {
            $table->unsignedMediumInteger('movieid')->index('akatitles_movieid');
            $table->char('language', 3);
            $table->text('title')->index('akatitles_title');
            $table->text('addition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akatitles');
    }
};
