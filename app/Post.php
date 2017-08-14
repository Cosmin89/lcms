<?php

namespace App;

use Laravel\Scout\Searchable; 
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    protected $fillable = [
        'category_id', 'title', 'slug', 'user', 'content'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function statuses()
    {
        return $this->belongsToMany('App\Status', 'post_status', 'post_id', 'status_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function hasAnyStatus($statuses)
    {
        if(is_array($statuses)) {
            foreach($statuses as $status) {
                if($this->hasStatus($status)) {
                    return true;
                }
            }
        } else {
            if($this->hasStatus($status)) {
                return true;
            }
        }

        return false;
    }

    public function hasStatus($status) {
        if($this->statuses()->where('type', $status)->first()) {
            return true;
        }

        return false;
    }

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function approvedComments()
    {
        return $this->hasMany('App\Comment')->approved();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'taggable', 'post_id', 'tag_id');
    }


}
