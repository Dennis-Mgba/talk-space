<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [             // to enable mass assignment of the title column
        'title'
    ];


    public function discussions()
    {
        return $this->hasMany('App\Discussion');
    }
}
