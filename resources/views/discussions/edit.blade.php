@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">Edit discussion</div>
    <div class="panel-body">
        <form class="" action="{{ route('discussion.update', ['id' => $discussion->id]) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <textarea name="content" id="content" class="form-control" rows="8" cols="80">{{ $discussion->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-success pull-right">Save discussion changes</button>
        </form>
    </div>
</div>
@endsection
