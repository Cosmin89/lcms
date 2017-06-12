<?php

namespace App;

use Laravel\Scout\Searchable; 
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password', 'user_image', 'user_role'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function searchableAs()
    {
        return 'posts_index';
    }
}
