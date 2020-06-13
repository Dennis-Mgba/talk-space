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
                <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" style="width:25px; height:25px; border-radius:50%;"> <!-- avatar of the person that replied -->
                &nbsp;&nbsp;&nbsp;
                <span><b>{{ $reply->user->name }},</b> {{ $reply->created_at->diffForHumans() }}</span>

                <span class="pull-right" style="margin-right: 50px;">
                    Like
                </span>
            </div>
        </div>
    @endforeach

@endsection
