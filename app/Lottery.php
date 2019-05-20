<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lottery extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'image',
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
     * Set the lottery or raffle's slug field.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * Delete lottery image from storage
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    /**
     * Get the lottery's image.
     *
     * @param  string  $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        if (!$value) {
            return $value;
        }

        return Storage::url($value);
    }
}
