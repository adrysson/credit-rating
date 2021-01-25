<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'address',
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

    /**
     * Get all of the user's registered debts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function debts()
    {
        return $this->hasMany(Debt::class);
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
