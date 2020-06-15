@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Created by -
            <span><b>{{ $discussion->user->name }},</b> {{ $discussion->created_at->diffForHumans() }}</span>
        </div>
        <div class="panel-body">
            <h4 class="text-center"><b>{{ $discussion->title }}</b></h4>
            <p class="text-center">{{ $discussion->content }}</p>
        </div>
        <div class="panel-footer">
            <p>
                {{ $discussion->replies->count() }} Replies
            </p>
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
                </span>
            </div>
        </div>
    @endforeach

    <div class="panel panel-default">
        <div class="panel-body">
            <form class="" action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="content" id='reply' rows="3" cols="110" style="border-radius: 8px;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-xs pull-right" style="border-radius: 7px;">Leave a reply</button>
            </form>
        </div>
    </div>

@endsection
