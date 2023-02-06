<?php

namespace App\Traits;

use App\Models\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

trait DefaultValueForCreatedByAndUpdatedBy
{
    protected static function bootDefaultValueForCreatedByAndUpdatedBy()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->check() ? auth()->id() : 1;
            $model->updated_by = auth()->check() ? auth()->id() : 1;
            $model->active = static::class === Session::class ? false : true;
        });

        static::updating(function ($model){
            $model->updated_by = auth()->check() ? auth()->id() : 1;
        });
    }
}


