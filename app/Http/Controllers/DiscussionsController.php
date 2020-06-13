<?php

namespace App\Http\Controllers;

use App\Discussion;
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
        return view('discussions.show')->with('discussion', Discussion::where('slug', $slug)->first());
    }
}
