<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_status', 'status_id', 'post_id');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Comment', 'comment_status', 'status_id', 'comment_id');
    }

}
