<?php

namespace App\Services;

class ImageService
{
    public static function upload($cover)
    {
        if ($cover) {
            return $cover->store('series_covers', 'public');
        }
        return null;
    }

    public static function delete($cover)
    {
        if ($cover) {
            \Storage::disk('public')->delete($cover);
        }
    }
}
