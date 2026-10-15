<?php

declare(strict_types=1);

namespace App\Helpers\Libs;

class NameHelper
{
    /**
     * Format a name from "Last, First (I)" to "First Last (I)".
     *
     * @param string $name The name in "Last, First" format
     * @return string The formatted name
     */
    public static function formatName(string $name): string
    {
        // Check if name contains a comma (indicating "Last, First" format)
        if (!str_contains($name, ',')) {
            return $name;
        }

        // Extract any suffix like (I), (IV), Jr., etc.
        $suffix = '';
        if (preg_match('/(\s+\([IVXLCDM]+\)|\s+Jr\.|\s+Sr\.|\s+III|\s+II)$/i', $name, $matches)) {
            $suffix = $matches[1];
            $name = substr($name, 0, -strlen($suffix));
        }

        // Split by comma
        $parts = explode(',', $name, 2);
        if (count($parts) === 2) {
            return trim($parts[1]) . ' ' . trim($parts[0]) . $suffix;
        }

        return $name . $suffix;
    }
}
