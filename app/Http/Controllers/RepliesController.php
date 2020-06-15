<?php

namespace App\Http\Controllers;
use App\Like;
use App\Reply;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id)
    {
        Like::create([
            'reply_id' =>$id,
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'Liked');
        return redirect()->back();
    }

    public function unlike($id)
    {
        // find the reply that was liked and the authenticated user that liked the reply then  delete input
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        Session::flash('success', 'Unliked');
        return redirect()->back();
    }
}
