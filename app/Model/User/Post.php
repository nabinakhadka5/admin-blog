<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','subtitle','slug','body','status','posted_by','image','like','dislike'];

    public function categories(){
        return $this->belongsToMany('App\Model\User\Category','category_posts');

    }
    public function tags(){
        return $this->belongsToMany('App\Model\User\Tag','post_tags');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
