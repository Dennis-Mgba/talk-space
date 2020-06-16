<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Channel;

use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index()
    {
        $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);   // paginate giving us 3 discussion post per page
        return view('forum', ['discussions' => $discussions]);  // in the view() method, the first parameter is the view page, the secod param in an array is the data fetched with the variable we are passing it into
    }


    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();
        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}
