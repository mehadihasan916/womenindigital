<?php

namespace App\Models;

use App\Models\PathFinder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PathFinderReply extends Model
{
    use HasFactory;

    protected $guarded = [];

    // belongsTo Relationship with PathFinder model
    public function pathFinderReply()
    {
        return $this->belongsTo(PathFinder::class);
    }

}
