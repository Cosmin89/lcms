<?php

namespace App;

use Laravel\Scout\Searchable; 
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    protected $fillable = [
        'category_id', 'title', 'author', 'user', 'content', 'tags', 'status'
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
