<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number_time',
        'alias',
        'description',
    ];

    /**
     * Get the route key for the model.
     * To use a database column other than id
     * when retrieving a given model class.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the results for the lottery.
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    /**
     * Set the time's slug field.
     *
     * @param  string  $value
     * @return void
     */
    public function setAliasAttribute($value)
    {
        $this->attributes['alias'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
