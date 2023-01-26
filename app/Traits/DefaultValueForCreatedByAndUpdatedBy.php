<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait DefaultValueForCreatedByAndUpdatedBy
{
    protected static function bootDefaultValueForCreatedByAndUpdatedBy()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->check() ? auth()->id() : 1;
            $model->updated_by = auth()->check() ? auth()->id() : 1;
        });

        static::updating(function ($model){
            $model->updated_by = auth()->check() ? auth()->id() : 1;
        });
    }
}


