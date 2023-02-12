<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use App\Traits\DefaultValueForCreatedByAndUpdatedBy;
use App\Traits\HasUserName;
use App\Traits\MakeDateReadable;
use App\Traits\TransformCreatedByAndUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
    use HasFactory, SoftDeletes, DefaultValueForCreatedByAndUpdatedBy, MakeDateReadable, BelongsToUser;

    protected $fillable = ['name', 'active', 'deleted_at'];

    //relationship shows that classroom has many assignclassandsubject assigned
    public function assignClassAndSubject()
    {
        return $this->hasMany(AssignClassAndSubject::class);
    }

}
