@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach($statuses as $status)
                <blockquote>
                    <p>{{ $status['status'] }}</p>
                    <a href="{{ \URL::action('StatusController@edit', [ $authUserId, $status['id'] ]) }}">Edit</a>
                </blockquote>
            @endforeach
        </div>
    </div>
</div>
@endsection