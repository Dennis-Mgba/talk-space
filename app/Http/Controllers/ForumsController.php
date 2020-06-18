<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Channel;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
        // $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
        switch (request('filter')) {
            case 'me':
                $discussions = Discussion::where('user_id', Auth::id())->paginate(3);
                break;

            case 'solved':
                $answered_discussions = array();
                foreach(Discussion::all() as $d)
                {
                    if($d->has_best_answer())
                    {
                        array_push($answered_discussions, $d);
                    }
                }
                $discussions = new Paginator($answered_discussions, 3);
                break;

                case 'unsolved':
                    $unanswered_discussions = array();
                    foreach(Discussion::all() as $d)
                    {
                        if(!$d->has_best_answer())
                        {
                            array_push($unanswered_discussions, $d);
                        }
                    }
                    $discussions = new Paginator($unanswered_discussions, 3);
                    break;

            default:
                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }

        return view('forum', ['discussions' => $discussions]);
    }


    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();
        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}
