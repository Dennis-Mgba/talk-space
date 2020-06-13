@extends('layouts.app')

@section('content')
    <!-- create a panel for each of the discussions -->
    @foreach ($discussions as $discussion)
        <div class="panel panel-default">
            <div class="panel-heading">
                Created by -
                <img src="{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}" style="width:30px; height:30px; border-radius:50%;"> <!-- avatar of the person that created the post -->
                &nbsp;&nbsp;&nbsp;
                <span><b>{{ $discussion->user->name }},</b> {{ $discussion->created_at->diffForHumans() }}</span>
                <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" class="btn btn-info btn-xs pull-right">Veiw discussion</a>
            </div>
            <div class="panel-body">
                <h4 class="text-center"><b>{{ $discussion->title }}</b></h4>
                <p class="text-center">{{ str_limit($discussion->content, 100) }}</p>  <!-- str_limit() limits that amount of character that will be dislayed -->
            </div>
            <div class="panel-footer">
                <p>
                    {{ $discussion->replies->count() }} Replies
                </p>
            </div>

        </div>
    @endforeach

    <div class="text-center">
        {{ $discussions->links() }}
    </div>
@endsection
