<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category() {
        return $this->belongsTo('App\Category'); //post belongs to a category (Category.php)
    }

    public function tags() {
        return $this->belongsToMany('App\Tag'); //post belongs to many tags
    }

    public function user() {
        return $this->belongsTo('App\User'); //post belongs to a User
    }

    public function reviews() {
        return $this->hasMany('App\Review'); // post has many reviews
    }
}
