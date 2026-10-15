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
        Schema::create('ratings', function (Blueprint $table) {
            $table->unsignedMediumInteger('movieid')->index('ratings_movieid');
            $table->char('rank', 4)->index('ratings_rank_idx');
            $table->unsignedMediumInteger('votes')->nullable();
            $table->char('distribution', 10);

            $table->index(['votes', 'rank'], 'ratings_votes_rank_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
