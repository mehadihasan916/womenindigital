<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathFinder extends Model
{
    use HasFactory;

    protected $guarded = [];

    // hasMany relationship with PathFinderReply model
    public function pathFinderReply()
    {
        return $this->hasMany(PathFinderReply::class);
    }

}
