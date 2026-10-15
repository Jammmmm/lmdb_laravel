<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\Libs\ImageHelper;
use App\Models\Movie;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MovieController extends Controller
{
    /**
     * Display a movie and its associated details.
     *
     * @param int $id The ID of the movie to retrieve details for.
     * @return View
     */
    public function show(int $id): View
    {
        // Retrieve the movie with all relevant relationships
        $movie = Movie::with([
            'actors',
            'directors',
            'producers',
            'genres',
            'plot',
            'rating',
            'tagline',
            'trivia',
            'quotes',
        ])->where('movieid', $id)->first();

        if (!$movie) {
            throw new NotFoundHttpException('Movie not found');
        }

        // Sort actors by their ranking (extracted from <number> in as_character)
        $movie->actors = $movie->actors->map(function ($actor) {
            // Remove the number ranking
            $actor->display_character = trim(
                preg_replace('/<\d+>/', '', $actor->pivot->as_character ?? '')
            );

            // Get the person's image
            $actor->actorImage = ImageHelper::getPersonImage($actor->actorid);
        
            return $actor;
        })->sortBy(function ($actor) {
            if (preg_match('/<(\d+)>/', $actor->pivot->as_character, $matches)) {
                return (int) $matches[1];
            }
        
            return 9999; // Put actors without ranking at the end
        });

        // Get the movie's image
        $movieImage = ImageHelper::getMovieImage($movie->movieid);

        return view('movies.show', compact(
            'movie',
            'movieImage',
        ));
    }
}
