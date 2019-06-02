<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'number',
        'series',
        'published_at',
        'lottery_id',
        'time_id',
        'user_id',
    ];

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

    /**
     * Get the user that added the Result.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
