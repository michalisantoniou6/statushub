@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach($statuses as $status)
                <blockquote>
                    <p>{{ $status['status'] }}</p>
                        @if( $status['user_id'] == $authUserId )
                            <a href="{{ \URL::action('StatusController@edit', [ $authUserId, $status['id'] ]) }}">Edit</a>
                        @endif
                    created at {{ $status['created_at'] }}
                </blockquote>
            @endforeach
        </div>
    </div>
</div>
@endsection