<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //tell model to use the categories table
    protected $table = 'categories';

    public function posts() {
        return $this->hasmany('App\Post'); //Category has many posts --> 1 category can have many posts  (Post.php)
    }
}