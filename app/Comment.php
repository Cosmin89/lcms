<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author', 'email', 'content', 'approved'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function statuses()
    {
        return $this->belongsToMany('App\Status', 'comment_status', 'comment_id', 'status_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }
}
