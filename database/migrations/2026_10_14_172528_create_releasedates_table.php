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
        Schema::create('releasedates', function (Blueprint $table) {
            $table->unsignedMediumInteger('movieid')->index('releasedates_movieid');
            $table->text('country')->nullable()->index('releasedates_country');
            $table->string('imdbdate', 50);
            $table->date('releasedate')->nullable()->index('releasedates_releasedate');
            $table->text('addition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('releasedates');
    }
};
