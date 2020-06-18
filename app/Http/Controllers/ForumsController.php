<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Channel;
use Auth;

use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index()
    {
        // $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
        switch (request('filter')) {
            case 'me':
                // query the discussions table where discussions is been created my a user
                $discussions = Discussion::where('user_id', Auth::id())->paginate(3);
                break;
            default:
                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }

        return view('forum', ['discussions' => $discussions]);  // in the view() method, the first parameter is the view page, the secod param in an array of the data fetched with the variable we are passing it into
    }


    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();
        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}
