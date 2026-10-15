<?php

declare(strict_types=1);

namespace App\Helpers\Libs;

class ImageHelper
{
    /**
     * Get the image path for a movie if it exists.
     *
     * @param int $movieId The movie ID
     * @return string|null The image path, or null if not found
     */
    public static function getMovieImage(int $movieId): ?string
    {
        $path = config('media.movie_images_path') . '/' . $movieId . '.jpg';
        $fullPath = public_path($path);
        return (file_exists($fullPath)) ? asset($path) : null;
    }

    /**
     * Get the image path for a person if it exists.
     *
     * @param int $personId The person ID
     * @return string|null The image path, or null if not found
     */
    public static function getPersonImage(int $personId): ?string
    {
        $path = config('media.person_images_path') . '/' . $personId . '.jpg';
        $fullPath = public_path($path);
        return (file_exists($fullPath)) ? asset($path) : null;
    }
}
