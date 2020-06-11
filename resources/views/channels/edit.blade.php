@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Channel: {{ $channel->title }}</div>

                <div class="panel-body">
                    <form class="" action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }} <!-- html does not support "PUT" method but in the laravel method PUT is the default so this line helps with that -->
                        <div class="form-group">
                            <input type="text" name="channel" value="{{ $channel->title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" name="button" class="btn btn-success">
                                    Update Channel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
