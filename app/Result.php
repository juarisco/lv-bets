<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $dates = [
        'published_at'
    ];

    /**
     * Get the lottery that owns the Result.
     */
    public function lottery()
    {
        return $this->belongsTo(Lottery::class);
    }

    /**
     * Get the time that owns the Result.
     */
    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
