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
        Schema::create('runningtimes', function (Blueprint $table) {
            $table->unsignedMediumInteger('movieid')->index('runningtimes_movieid');
            $table->string('time', 50);
            $table->text('addition');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('runningtimes');
    }
};
