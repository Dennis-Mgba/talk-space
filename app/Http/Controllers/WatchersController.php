<?php

namespace App\Http\Controllers;

use Auth;
use App\Watcher;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class WatchersController extends Controller
{
    public function watch($id)
    {
        Watcher::create([
            'discussion_id' => $id, // the discussion_id field will be the be been passed
            'user_id' => Auth::id() // the user_id that is requesting to watch a discussion will be an the authenticated user id
        ]);

        Session::flash('success', 'Watching discussion');
        return redirect()->back();
    }


    public function unwatch($id)
    {
        $watcher = Watcher::where('discussion_id', $id)->where('user_id', Auth::id());
        $watcher->delete();

        Session::flash('success', 'No longer Watching discussion');
        return redirect()->back();
    }
}
