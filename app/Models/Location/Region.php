<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region
 * @package App\Models\Location
 */
class Region extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'regions';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'name'
    ];

    /**
     * The number of models to return for pagination
     *
     * @var int
     */
    protected $perPage = 50;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
