<?php

declare(strict_types=1);

namespace App\Helpers\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ModelMovieRelationship
{
    // Define the BelongsTo relationship with the Movie model
    public function movie(): BelongsTo
    {
        return $this->belongsTo(
            Movie::class,      // The related model
            'movieid',         // The foreign key on the model
            'movieid'          // The local key on the related model (Movie)
        );
    }

    // Defines the BelongsToMany relationship with the Movie model
    public function movies(string $pivotTable, string $pivotFK): BelongsToMany
    {
        return $this->belongsToMany(
            Movie::class,   // The related model
            $pivotTable,    // The pivot table name
            $pivotFK,       // The foreign key on the pivot table for the model
            'movieid'       // The foreign key on the pivot table for the
                            // related model (Movie)
        )->withPivot('addition');   // Include the 'addition' field from the
                                    // pivot table
    }
}
