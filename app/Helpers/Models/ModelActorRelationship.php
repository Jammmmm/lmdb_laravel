<?php

declare(strict_types=1);

namespace App\Helpers\Models;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ModelActorRelationship
{
    // Define the belongsTo relationship with the Actor model
    public function actor(): BelongsTo
    {
        return $this->belongsTo(
            Actor::class,   // The related model
            'name',         // The foreign key on the model
            'name'          // The local key on the related model (Actor)
        );
    }
}
