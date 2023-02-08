<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\DefaultValueForCreatedByAndUpdatedBy;
use App\Traits\MakeDateReadable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use HasFactory, SoftDeletes, DefaultValueForCreatedByAndUpdatedBy, MakeDateReadable, BelongsToUser;

    protected $fillable = ['from', 'to', 'active', 'deleted_at'];
}
