<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Comment extends Model
{
    use Uuids;

    protected $fillable = [
        'name', 'comment', 'parent_id'
    ];

    public function scopeParents($query){
        return $query->where('parent_id',NULL);
    }

    public function children(){
        return $this->hasMany(self::class,'parent_id','id');
    }
}
