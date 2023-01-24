<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBiodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'firstname',
        'othername',
        'dob',
        'year_of_entry',
        'date_of_entry',
        'year_of_graduation',
        'current_class',
        'current_term',
        'gender',
        'nationality',
        'state',
        'lga'
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
