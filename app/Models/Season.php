<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Episode;
use App\Models\Series;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
