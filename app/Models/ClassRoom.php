<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'active'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($classroom) {
            $classroom->created_by = auth()->check() ? auth()->id() : 1;
            $classroom->updated_by = auth()->check() ? auth()->id() : 1;
        });
    }
}
