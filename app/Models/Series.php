<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Season;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cover'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class, 'series_id', 'season_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('order', function ($query) {
            $query->orderBy('name', 'asc');
        });
    }
}
