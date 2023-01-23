<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffBiodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'firstname',
        'othername',
        'gender',
        'phone_number',
        'nationality',
        'state',
        'lga'
    ];

    public function staff()
    {
        return $this->belongsTo(User::class);
    }
}
