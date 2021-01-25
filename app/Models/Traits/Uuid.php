<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid as UuidUuid;

trait Uuid
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = UuidUuid::uuid4();
        });
    }
}
