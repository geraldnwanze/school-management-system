<?php

namespace App\Models;

use App\Traits\DefaultValueForCreatedByAndUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, DefaultValueForCreatedByAndUpdatedBy;

    protected $fillable = [
        'user_id',
        'Reg_No',
        'sponsor_id',
        'surname', 
        'firstname', 
        'othername', 
        'email',
        'gender', 
        'phone_number',
        'nationality',
        'state_id',
        'lga_id',
        'dob',
        'date_of_entry',
        'year_of_entry',
        'year_of_graduation',
        'class_room_id',
        'current_term',
        'current_session',
    ];

    public function getFullNameAttribute()
    {
        return ucfirst($this->surname).' '.ucfirst($this->firstname).' '.ucfirst($this->othername);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function lga()
    {
        return $this->belongsTo(LGA::class);
    }
}
