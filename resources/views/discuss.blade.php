@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">Create a new discussion</div>
    <div class="panel-body">
        <form class="" action="{{ route('discussions.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="tile">Title</label>
                <input type="text" name="title" value="" class="form-control">
            </div>

            <!-- select options to pick a channel that a dicussion is will be created for -->
            <div class="form-group">
                <label for="channel">Select Channel</label>
                <select class="form-control" name="channel_id" id="channel_id">
                <!-- remember we already have the channel variable available across all file in our application -->
                <option></option>
                @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="content">Ask a question</label>
                <textarea name="content" id="content" class="form-control" rows="8" cols="80"></textarea>
            </div>

            <button type="submit" class="btn btn-success pull-right">Create discussion</button>
        </form>
    </div>
</div>
@endsection
