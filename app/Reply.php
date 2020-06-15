<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    // for mass assignment
    protected $fillable = [
        'content',
        'user_id',
        'discussion_id'
    ];

    public function discussion()
    {
        return $this->belongsTo('App\Discussion');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        $likers = array(); // declare an empty array, then push all the activated likers to it
        foreach($this->likes as $like):  // looping the like method specified in the function relationship
            array_push($likers, $like->user_id);  // first parameter the likers array that we are pushing into, second the id of the user that liked
        endforeach;

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }

    }
    
}
