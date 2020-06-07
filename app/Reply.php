<?php

namespace App;

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
}
