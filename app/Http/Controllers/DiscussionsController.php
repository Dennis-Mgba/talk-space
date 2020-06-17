<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Reply;
use App\User;
use Notification;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'channel_id' => 'required',
            'content' => 'required'
        ]);

        $discussion = Discussion::create([
            'user_id' => Auth::id(), // storing the user that created the discussion by getting the authenticated users id
            'channel_id' => $request->channel_id,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => str_slug($request->title)
        ]);

        Session::flash('success', 'Discussion successfully created');
        return redirect()->route('discussion', ['slug' => $discussion->slug ]);
    }


    public function show($slug)
    {
        // query the discussions table, where the slug get from the URL is identical to the slug passed and return it with the view
        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();    // get the reply where the best answer table is true, ie equal to 1

        return view('discussions.show')->with('discussion', $discussion)
                                       ->with('best_answer', $best_answer);         // also pass the best anwser to the view
    }


    public function reply($id)
    {
        $discussion = Discussion::find($id);    // id of the discussion that a reply is created for

        $reply = Reply::create([
            'user_id' =>Auth::id(), // id of the authenticated user
            'discussion_id' => $id,
            'content' => request()->content
        ]);

        $all_watchers = array();
        // get all the watchers of a discussion, get all the user object and push into the empty array.
        foreach($discussion->watchers as $watcher):
            array_push($all_watchers, User::find($watcher->user_id));
        endforeach;
        Notification::send($all_watchers, new \App\Notifications\NewReplyAdded($discussion)); // pass in the discussion as a parameter

        Session::flash('success', 'Discussion successfully created');
        return redirect()->back();
    }
}
