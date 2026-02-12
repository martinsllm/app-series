<?php

namespace App\Repositories;

use App\Models\Series;

interface SeriesRepository
{
    public function all($request): array;

    public function find($id): ?Series;

    public function add(array $data): Series;

    public function update(Series $series, array $data): void;
}
