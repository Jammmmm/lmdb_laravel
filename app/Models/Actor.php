<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
{
    protected $primaryKey = 'actorid';

    // An actor can be part of many titles
    public function movies (): BelongsToMany
    {
        return $this->belongsToMany (
            Movie::class,       // The related model
            'movies2actors',      // The pivot table name
            'actorid',  // The foreign key on the pivot table for the
            // model (Actor)
            'movieid'   // The foreign key on the pivot table for the
            // related model (Movie)
        )->withPivot ('as_character'); // Include the 'as_character' field from
        // the pivot table
    }
}
