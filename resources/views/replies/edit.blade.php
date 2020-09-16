@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading text-center">Edit Reply</div>
    <div class="panel-body">
        <form class="" action="{{ route('reply.update', ['id' => $reply->id]) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <textarea name="content" id="content" class="form-control" rows="8" cols="80">{{ $reply->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-success pull-right">Save reply changes</button>
        </form>
    </div>
</div>
@endsection
