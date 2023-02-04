<?php

namespace App\Models;

use App\Traits\DefaultValueForCreatedByAndUpdatedBy;
use App\Traits\MakeDateReadable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes, DefaultValueForCreatedByAndUpdatedBy, MakeDateReadable;

    protected $fillable = ['name', 'active', 'deleted_at'];

    protected function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    protected function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
