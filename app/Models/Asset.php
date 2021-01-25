<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Asset extends Model
{
    protected $collection = 'assets';

    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'value',
    ];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }
}
