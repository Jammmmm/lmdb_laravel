<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\Libs\ImageHelper;
use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Search for movies and actors.
     *
     * @param Request $request
     * @return View
     */
    public function search(Request $request): View
    {
        $query = $request->input('q', '');
        $query = ($query !== null) ? trim($query) : '';

        $movies = collect();
        $actors = collect();

        if ($query !== '') {
            // Split the search query by spaces to handle queries like "Cruise Tom"
            $terms = array_filter(explode(' ', $query));

            // Search for movies
            $movies = Movie::query()
                ->with(['rating', 'genres'])
                ->where(function ($q) use ($terms) {
                    foreach ($terms as $term) {
                        $q->where('title', 'LIKE', '%' . $term . '%');
                    }
                })
                ->orWhere(function ($q) use ($query) {
                    // Also search for the full query as a phrase
                    $q->where('title', 'LIKE', '%' . $query . '%');
                })
                ->orderByDesc('year')
                ->limit(50)
                ->get();

            if ($movies) {
                // Get each movie's image
                $movies = $movies->map(function ($movie) {
                    $movie->movieImage = ImageHelper::getMovieImage($movie->movieid);
                    return $movie;
                });
            }

            // Search for actors
            $actors = Actor::query()
                ->with(['movies' => function ($q) {
                    $q->limit(3);
                }])
                ->where(function ($q) use ($terms) {
                    foreach ($terms as $term) {
                        $q->where('name', 'LIKE', '%' . $term . '%');
                    }
                })
                ->orWhere(function ($q) use ($query) {
                    // Also search for the full query as a phrase
                    $q->where('name', 'LIKE', '%' . $query . '%');
                })
                ->limit(50)
                ->get();

            if ($actors) {
                // Get each actor's image
                $actors = $actors->map(function ($actor) {
                    $actor->actorImage = ImageHelper::getPersonImage($actor->actorid);
                    return $actor;
                });
            }
        }

        return view('search.results', compact(
            'query',
            'movies',
            'actors',
        ));
    }
}
