@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Channels</div>

                <div class="panel-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    <table class="table table-hover">
                        <thead>
                            <th>Channel name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($channels as $channel)
                                <tr>
                                    <td>
                                        {{ $channel->title }}
                                    </td>
                                    <td>
                                        <a href="{{ route('channels.edit', ['channel' => $channel->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }} <!-- html does not support "DELETE" method but in the laravel method DELETE is the default so this line helps with that -->
                                            <button type="submit" class="btn btn-xs btn-danger">Destroy</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
