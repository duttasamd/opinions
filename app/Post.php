<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        //if id is not autoincrement then add 'id'
        'title',
        'description',
        'profile_id'
    ];
    //
    public function scopeSearch($query, $keywords)
    {
        return $query->limit(10)->where('title', 'LIKE', '%'.$keywords.'%');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
