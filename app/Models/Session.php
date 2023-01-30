<?php

namespace App\Models;

use App\Traits\DefaultValueForCreatedByAndUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use HasFactory, SoftDeletes, DefaultValueForCreatedByAndUpdatedBy;

    protected $fillable = ['from', 'to', 'active'];
}
