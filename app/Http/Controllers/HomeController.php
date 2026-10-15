<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     * 
     * @return View
     */
    public function index(): View
    {
        // Get 6 random movies with their ratings and genres
        $movies = Movie::with(['rating', 'genres'])
            ->inRandomOrder()
            ->limit(6)
            ->get();

        // Get 6 random actors with their movies (limited to 3 movies each)
        $actors = Actor::with(['movies' => function ($query) {
            $query->limit(3);
        }])
            ->inRandomOrder()
            ->limit(6)
            ->get();

        return view('home', compact(
            'movies',
            'actors',
        ));
    }
}
