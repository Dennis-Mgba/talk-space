@extends('layouts.app')

@section('content')
    <!-- create a panel for each of the discussions -->
    @foreach ($discussions as $discussion)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}" style="width:70px; height:70px; border-radius:50%;"> <!-- avatar of the person that created the post -->
            </div>
            <div class="panel-body">
                {{ $discussion->content }}
            </div>
        </div>
    @endforeach

    <div class="text-center">
        {{ $discussions->links() }}
    </div>
@endsection
