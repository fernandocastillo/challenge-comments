<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'name', 'comment', 'parent_id'
    ];

    public function scopeParents($query){
        return $query->where('parent_id',NULL);
    }
}
