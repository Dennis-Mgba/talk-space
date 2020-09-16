@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Created by -
            <span><b>{{ $discussion->user->name }},</b> {{ $discussion->created_at->diffForHumans() }}</span>
            @if ($discussion->is_being_watched_by_auth_user())
                <a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-default pull-right btn-xs">Unwatch</a>
            @else
                <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-default pull-right btn-xs">Watch</a>
            @endif
        </div>

        <div class="panel-body">
            <h4 class="text-center"><b>{{ $discussion->title }}</b></h4>
            <p class="text-center">{{ $discussion->content }}</p><hr>

            @if ($best_answer)
                <div class="text-center" style="padding: 40px;">
                    <h5 class="text-center"> <b>Best Answer</b> </h5>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <img src="{{ $best_answer->user->avatar }}" alt="" style="width: 25px; height: 25px;">
                            &nbsp;&nbsp;&nbsp;
                            <span>{{ $best_answer->user->name }}</span>
                        </div>
                        <div class="panel-body">
                            {{ $best_answer->content }}
                        </div>
                    </div>
                </div>
            @endif

        @if (Auth::id() == $discussion->user->id)
            @if (!$discussion->has_best_answer())
                <span>
                    <a href="{{ route('discussion.edit', ['slug' => $discussion->slug] )}}">Edit</a>
                </span>
            @endif
        @endif

        </div>
        <div class="panel-footer">
            <span>
                {{ $discussion->replies->count() }} Replies
            </span>

            <a href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}" class="pull-right btn btn-default btn-xs">{{ $discussion->channel->title }}</a>
        </div>
    </div>

    <!-- display the replies for the discussions -->
    @foreach ($discussion->replies as $reply)
        <div class="panel panel-default" style="border-radius: 30px;">
            <div class="panel-body">
                <p class="">{{ $reply->content }}</p><hr>
                <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" style="width:25px; height:25px; border-radius:30px;"> <!-- avatar of the person that replied -->
                &nbsp;&nbsp;&nbsp;
                <span><b>{{ $reply->user->name }},</b> {{ $reply->created_at->diffForHumans() }}</span>

                <span class="pull-right" style="margin-right: 50px;">
                    @if ($reply->is_liked_by_auth_user()) <!-- call the method on the reply class -->
                        <a href="{{ route('reply.unlike', ['id' => $reply->id]) }}" class="btn btn-xs btn-danger">Unlike <span class="badge">{{ $reply->likes->count() }}</span> </a>
                    @else
                        <a href="{{ route('reply.like', ['id' => $reply->id]) }}" class="btn btn-xs btn-success">Like <span class="badge">{{ $reply->likes->count() }}</span> </a>
                    @endif
                    &nbsp;&nbsp;&nbsp;

                    @if (!$best_answer)
                        @if (Auth::id() == $discussion->user->id) <!-- check if the authenticated user is the one that created the discussion -->
                            <a href="{{ route('reply.best.answer', ['id' => $reply->id]) }}" class="btn btn-info btn-xs">Mark as best answer</a>
                        @endif
                    @endif

                    @if (Auth::id() == $reply->user->id) <!-- check if the authenticated user is the one that created the reply  -->
                        @if (!$reply->best_answer) <!-- check if the reply is not selected as the best answer -->
                            <a href="{{ route('reply.edit', ['id' => $reply->id]) }}">Edit</a>
                        @endif
                    @endif
                </span>
            </div>
        </div>
    @endforeach

    <!-- leave a reply form -->
    <div class="panel panel-default">
        <div class="panel-body">
            @if (Auth::check())
                <form class="" action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="content" id='reply' rows="5" cols="110" style="border-radius: 8px; padding: 10px;"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-xs pull-right" style="border-radius: 7px;">Leave a reply</button>
                </form>
            @else
                <div class="text-center">
                    <h2>Sign in to leave a reply</h2>
                </div>
            @endif
        </div>
    </div>

@endsection
