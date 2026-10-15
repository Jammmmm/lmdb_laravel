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
        Schema::create('movies2directors', function (Blueprint $table) {
            $table->unsignedMediumInteger('movieid')->index('movies2directors_movieid');
            $table->unsignedMediumInteger('directorid')->index('movies2directors_directorid');
            $table->text('addition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies2directors');
    }
};
