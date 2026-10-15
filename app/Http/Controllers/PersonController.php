<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\Libs\ImageHelper;
use App\Models\Actor;
use App\Models\Biography;
use App\Models\Director;
use App\Models\Producer;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PersonController extends Controller
{
    /**
     * Display a person's details and filmography.
     *
     * @param string $type The type of person (actor, director, or producer)
     * @param int $id The ID of the person
     * @return View
     */
    public function show(string $type, int $id): View
    {
        $person = null;
        $movies = collect();

        // Get the person's details
        switch ($type) {
            case 'actor':
                $person = Actor::where('actorid', $id)->first();
                if ($person) {
                    $movies = $person->movies()
                        ->with(['rating'])
                        ->orderByDesc('year')
                        ->get();

                    if ($movies) {
                        // Remove the number ranking from the character
                        $movies = $movies->map(function ($movie) {
                            $movie->pivot->as_character = trim(
                                preg_replace('/<\d+>/', '', $movie->pivot->as_character ?? '')
                            );

                            return $movie;
                        });
                    }
                }
                break;

            case 'director':
                $person = Director::where('directorid', $id)->first();
                if ($person) {
                    $movies = $person->movies('movies2directors', 'directorid')
                        ->with(['rating'])
                        ->orderByDesc('year')
                        ->get();
                }
                break;

            case 'producer':
                $person = Producer::where('producerid', $id)->first();
                if ($person) {
                    $movies = $person->movies('movies2producers', 'producerid')
                        ->with(['rating'])
                        ->orderByDesc('year')
                        ->get();
                }
                break;

            default:
                throw new NotFoundHttpException('Invalid person type');
        }

        if (!$person) {
            throw new NotFoundHttpException('Person not found');
        }

        // Get biography if available
        $biography = Biography::where('name', $person->name)->first();

        // Get the person's image
        $personId = match ($type) {
            'actor' => $person->actorid,
            'director' => $person->directorid,
            'producer' => $person->producerid,
            default => null,
        };
        $personImage = $personId !== null ?
            ImageHelper::getPersonImage($personId)
            : null;

        // Get the image for each movie
        if ($movies) {
            $movies = $movies->map(function ($movie) {
                $movie->movieImage = ImageHelper::getMovieImage($movie->movieid);
                return $movie;
            });
        }

        return view('people.show', compact(
            'person',
            'personImage',
            'movies',
            'type',
            'biography',
        ));
    }
}
