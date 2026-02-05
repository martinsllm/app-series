<?php

namespace App\Services;

class ImageUploadService
{
    public static function upload($cover)
    {
        if ($cover) {
            return $cover->store('series_covers', 'public');
        }
        return null;
    }
}
