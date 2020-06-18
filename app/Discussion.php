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

        foreach($this->watchers as $watching_individuals):                      // remember that we referencing the watchers table relationship method
            array_push($all_watchers_ids, $watching_individuals->user_id);
        endforeach;

        if (in_array($id, $all_watchers_ids)) {
            return true;
        } else {
            return false;
        }
    }


    public function has_best_answer()
    {
        $result = false;                        // boolean variable
        foreach($this->replies as $reply)      // remember that we referencing the replies table relationship method
        {
            if ($reply->best_answer) {            // accessing the best_answer column from the replies table
                $result = true;
                break;
            }
        }

        return $result;                     // if the result returned is true that makes the has_best_answer function true
    }

}
