<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Screening extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'movie_id',
        'date',
        'vacant_seats'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
