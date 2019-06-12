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

    /**
     * Scope a query to only get the results of the last published_at.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeResultsLastPublishedAt($query)
    {
        // Get the last published_at from results
        $lastPublishedAt = $this->latest('published_at')->value('published_at');

        // Filter the results of the last pusblished_at
        return $query->where('published_at', $lastPublishedAt);
    }

    /**
     * Scope a query to only get the results of the last published_at.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if (!$search) {
            return $query;
        }

        return $query->where('number', 'LIKE', "%{$search}");
    }
}
