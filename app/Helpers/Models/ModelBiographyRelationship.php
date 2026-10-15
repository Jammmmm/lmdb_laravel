<?php

declare(strict_types=1);

namespace App\Helpers\Models;

use App\Models\Biography;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ModelBiographyRelationship
{
    // Define the belongsTo relationship with the Biography model
    public function biographies(): BelongsTo
    {
        return $this->belongsTo(
            Biography::class,   // The related model
            'name',             // The foreign key on the model
            'name'              // The local key on the related model (Biography)
        );
    }
}
