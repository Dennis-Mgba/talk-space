@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Create A New Channel</div>

        <div class="panel-body">
            <form class="" action="{{ route('channels.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" name="channel" value="" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" name="button" class="btn btn-success">
                            Save Channel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
