<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movie extends Model
{
    protected $primaryKey = 'movieid';

    // A movie can have many actors (via pivot table)
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(
            Actor::class,       // The related model
            'movies2actors',      // The pivot table name
            'movieid',  // The foreign key on the pivot table for the
            // model(Movie)
            'actorid'   // The foreign key on the pivot table for the
            // related model(Cinematgr)
        )->withPivot('as_character'); // Include the 'as_character' field from
            // the pivot table
    }

    // A movie can have many aka titles
    public function akatitles(): HasMany
    {
        return $this->hasMany(Akatitle::class, 'movieid', 'movieid');
    }

    // A movie can have many alternative versions
    public function alternativeversions(): HasMany
    {
        return $this->hasMany(AltVersion::class, 'movieid', 'movieid');
    }

    // A movie is associated with one business row
    public function business(): HasOne
    {
        return $this->hasOne(Business::class, 'movieid', 'movieid');
    }

    // A movie can have many certificates
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'movieid', 'movieid');
    }

    // A movie can have many cinematographers (via pivot table)
    public function cinematographers(): BelongsToMany
    {
        return $this->belongsToMany(
            Cinematgr::class,   // The related model
            'movies2cinematgrs',  // The pivot table name
            'movieid',  // The foreign key on the pivot table for the
            // model(Movie)
            'cinematid' // The foreign key on the pivot table for the
            // related model(Cinematgr)
        )->withPivot('addition'); // Include the 'addition' field from the
            // pivot table
    }

    // A movie can have many color information rows
    public function colorinformation(): HasMany
    {
        return $this->hasMany(ColorInfo::class, 'movieid', 'movieid');
    }

    // A movie can have many composers (via pivot table)
    public function composers(): BelongsToMany
    {
        return $this->belongsToMany(
            Composer::class,   // The related model
            'movies2composers',  // The pivot table name
            'movieid', // The foreign key on the pivot table for the
            // model(Movie)
            'composerid'    // The foreign key on the pivot table for the
            // related model(Composer)
        )->withPivot('addition');  // Include the 'addition' field from the
            // pivot table
    }

    // A movie can have many costume designers (via pivot table)
    public function costumedesigners(): BelongsToMany
    {
        return $this->belongsToMany(
            CostDesigner::class,    // The related model
            'movies2costdes',         // The pivot table name
            'movieid',      // The foreign key on the pivot table for the
            // model(Movie)
            'costdesid'     // The foreign key on the pivot table for the
            // related model(CostDesigner)
        )->withPivot('addition');  // Include the 'addition' field from the
            // pivot table
    }

    // A movie can be associated with many countries
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'movieid', 'movieid');
    }

    // A movie is associated with one crazy credits row
    public function crazycredit(): HasOne
    {
        return $this->hasOne(CrazyCredit::class, 'movieid', 'movieid');
    }

    // A movie can have many directors (via pivot table)
    public function directors(): BelongsToMany
    {
        return $this->belongsToMany(
            Director::class,    // The related model
            'movies2directors',   // The pivot table name
            'movieid',  // The foreign key on the pivot table for the
            // model(Movie)
            'directorid'    // The foreign key on the pivot table for the
            // related model(Director)
        )->withPivot('addition');  // Include the 'addition' field from the
            // pivot table
    }

    // A movie can have many distributors
    public function distributors(): HasMany
    {
        return $this->hasMany(Distributor::class, 'movieid', 'movieid');
    }

    // A movie can have many editors (via pivot table)
    public function editors(): BelongsToMany
    {
        return $this->belongsToMany(
            Editor::class,      // The related model
            'movies2editors',     // The pivot table name
            'movieid',  // The foreign key on the pivot table for the
            // model(Movie)
            'editorid'  // The foreign key on the pivot table for the
            // related model(Editor)
        )->withPivot('addition'); // Include the 'addition' field from the
            // pivot table
    }

    // A movie can have many genres
    public function genres(): HasMany
    {
        return $this->hasMany(Genre::class, 'movieid', 'movieid');
    }

    // A movie is associated with one goofs row
    public function goof(): HasOne
    {
        return $this->hasOne(Goof::class, 'movieid', 'movieid');
    }

    // A movie can have many keywords
    public function keywords(): HasMany
    {
        return $this->hasMany(Keyword::class, 'movieid', 'movieid');
    }

    // A movie can have many languages
    public function languages(): HasMany
    {
        return $this->hasMany(Language::class, 'movieid', 'movieid');
    }

    // A movie is associated with one literature row
    public function literature(): HasOne
    {
        return $this->hasOne(Literature::class, 'movieid', 'movieid');
    }

    // A movie can have many locations
    public function locations(): HasMany
    {
        return $this->hasMany(Location::class, 'movieid', 'movieid');
    }

    // A movie can have many miscellaneous items (via pivot table)
    public function miscellaneous(): BelongsToMany
    {
        return $this->belongsToMany(
            Misc::class,        // The related model
            'movies2misc',        // The pivot table name
            'movieid',  // The foreign key on the pivot table for the
            // model(Movie)
            'miscid'    // The foreign key on the pivot table for the
            // related model(Misc)
        )->withPivot('addition'); // Include the 'addition' field from the
            // pivot table
    }

    // A movie is associated with one movielinks row
    public function movielink(): HasOne
    {
        return $this->hasOne(MovieLink::class, 'movieid', 'movieid');
    }

    // A movie can have many MPAA ratings
    public function mpaaratings(): HasMany
    {
        return $this->hasMany(MpaaRating::class, 'movieid', 'movieid');
    }

    // A movie is associated with one plot row
    public function plot(): HasOne
    {
        return $this->hasOne(Plot::class, 'movieid', 'movieid');
    }

    // A movie can have many production companies
    public function productioncompanies(): HasMany
    {
        return $this->hasMany(ProdCompany::class, 'movieid', 'movieid');
    }

    // A movie can have many production designers (via pivot table)
    public function productiondesigners(): BelongsToMany
    {
        return $this->belongsToMany(
            ProdDesigner::class,     // The related model
            'movies2proddes',          // The pivot table name
            'movieid',       // The foreign key on the pivot table for the
            // model(Movie)
            'proddesid'      // The foreign key on the pivot table for the
            // related model(ProdDesigner)
        )->withPivot('addition');   // Include the 'addition' field from the
            // pivot table
    }

    // A movie can have many producers (via pivot table)
    public function producers(): BelongsToMany
    {
        return $this->belongsToMany(
            Producer::class,    // The related model
            'movies2producers',   // The pivot table name
            'movieid',  // The foreign key on the pivot table for the
            // model(Movie)
            'producerid'    // The foreign key on the pivot table for the
            // related model(Producer)
        )->withPivot('addition');  // Include the 'addition' field from the
            // pivot table
    }

    // A movie is associated with one quote row
    public function quotes(): HasOne
    {
        return $this->hasOne(Quote::class, 'movieid', 'movieid');
    }

    // A movie is associated with one rating row
    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class, 'movieid', 'movieid');
    }

    // A movie can have many release dates
    public function releasedates(): HasMany
    {
        return $this->hasMany(ReleaseDate::class, 'movieid', 'movieid');
    }

    // A movie can have many run times
    public function runningtimes(): HasMany
    {
        return $this->hasMany(RunningTime::class, 'movieid', 'movieid');
    }

    // A movie can have many sound mixes
    public function soundmixes(): HasMany
    {
        return $this->hasMany(SoundMix::class, 'movieid', 'movieid');
    }

    // A movie is associated with one soundtrack row
    public function soundtrack(): HasOne
    {
        return $this->hasOne(Soundtrack::class, 'movieid', 'movieid');
    }

    // A movie is associated with one tagline row
    // Technically this should be hasMany since there's a movieid with 2 entries
    // but that's probably a mistake.
    public function tagline(): HasOne
    {
        return $this->hasOne(Tagline::class, 'movieid', 'movieid');
    }

    // A movie can have many technical details
    public function technical(): HasMany
    {
        return $this->hasMany(Technical::class, 'movieid', 'movieid');
    }

    // A movie is associated with one trivia row
    public function trivia(): HasOne
    {
        return $this->hasOne(Trivia::class, 'movieid', 'movieid');
    }

    // A movie can have many writers (via pivot table)
    public function writers(): BelongsToMany
    {
        return $this->belongsToMany(
            Writer::class,     // The related model
            'movies2writers',    // The pivot table name
            'movieid', // The foreign key on the pivot table for the
            // model(Movie)
            'writerid' // The foreign key on the pivot table for the
            // related model(Writer)
        )->withPivot('addition'); // Include the 'addition' field from the
            // pivot table
    }
}
