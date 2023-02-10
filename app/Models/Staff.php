<?php

namespace App\Models;

use App\Traits\DefaultValueForCreatedByAndUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes, DefaultValueForCreatedByAndUpdatedBy;

    protected $fillable = [
        'surname', 
        'firstname', 
        'othername', 
        'email',
        'gender', 
        'phone_number',
        'nationality',
        'state',
        'lga',
        'deleted_at'
    ];

    public function getFullNameAttribute()
    {
        return ucfirst($this->surname).' '.ucfirst($this->firstname).' '.ucfirst($this->othername);
    }
}
