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

    public function statuses()
    {
        return $this->belongsToMany('App\Status', 'post_status', 'post_id', 'status_id');
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

}
