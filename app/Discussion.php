<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'channel_id'
    ];

    // setup a reverse relationship with the chaannel table, remember it's one channel for discussion
    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function watchers()
    {
        return $this->hasMany('App\Watcher');
    }


    public function  is_being_watched_by_auth_user()
    {
        $id = Auth::id();
        $all_watchers_ids = array();

        foreach($this->watchers as $watching_individuals):
            array_push($all_watchers_ids, $watching_individuals->user_id);
        endforeach;

        if (in_array($id, $all_watchers_ids)) {
            return true;
        } else {
            return false;
        }
    }
    
}
