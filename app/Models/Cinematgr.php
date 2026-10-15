<?php

namespace App\Models;

use App\Helpers\Models\ModelAkaNameRelationship;
use App\Helpers\Models\ModelBiographyRelationship;
use App\Helpers\Models\ModelMovieRelationship;
use Illuminate\Database\Eloquent\Model;

class Cinematgr extends Model
{
    // Imports common functionality
    use ModelAkaNameRelationship;
    use ModelBiographyRelationship;
    use ModelMovieRelationship;
}
