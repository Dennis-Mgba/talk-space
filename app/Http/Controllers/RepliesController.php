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

        Session::flash('success', 'Reply Liked');
        return redirect()->back();
    }


    public function unlike($id)
    {
        // find the reply that was liked and the authenticated user that liked the reply then  delete input
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        Session::flash('success', 'Reply Unliked');
        return redirect()->back();
    }


    public function best_answer($id)
    {
        $reply = Reply::find($id);
        $reply->best_answer = 1;
        $reply->save();

        Session::flash('success', 'Reply has been marked as the best answer');
        return redirect()->back();
    }


    public function edit($id)
    {
        return view('replies.edit', [
            'reply' => Reply::find($id)
        ]);
    }


    public function update($id)
    {
        $this->validate(request(), [
            'content' => 'required'
        ]);

        $reply = Reply::find($id);
        $reply->content = request()->content;
        $reply->save();

        Session::flash('success', 'Reply updated');
        return redirect()->route('discussion', [
            'slug' => $reply->discussion->slug
        ]);
    }

}
