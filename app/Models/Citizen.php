<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Citizen extends Model
{
    protected $collection = 'citizens';

    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
        'address',
        'age',
        'source_of_income',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'cpf',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'address' => 'json',
    ];

    public function assets()
    {
        return $this->embedsMany(Asset::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'cpf';
    }

    /**
     * Set the person's cpf.
     *
     * @param  string  $value
     * @return void
     */
    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = md5(env('APP_KEY') . $value);
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($this->getRouteKeyName(), md5(env('APP_KEY') . $value))->firstOrFail();
    }
}
