<?php

namespace App\Models;

use App\Traits\DefaultValueForCreatedByAndUpdatedBy;
use App\Traits\MakeDateReadable;
use App\Traits\TransformCreatedByAndUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes, DefaultValueForCreatedByAndUpdatedBy, MakeDateReadable, TransformCreatedByAndUpdatedBy;

    protected $fillable = ['name', 'active', 'deleted_at'];

}
