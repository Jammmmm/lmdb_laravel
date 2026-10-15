<?php

declare(strict_types=1);

namespace App\Helpers\Models;

use App\Models\Akaname;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ModelAkaNameRelationship
{
    // Define the belongsTo relationship with the AkaName model
    public function akanames(): BelongsTo
    {
        return $this->belongsTo(
            AkaName::class, // The related model
            'name',         // The foreign key on the model
            'name'          // The local key on the related model (AkaName)
        );
    }
}
