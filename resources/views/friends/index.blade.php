@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Friends List</h1>
                @foreach($friends as $friend)
                    <div class="box">
                        {!! Form::open(['route' => [ 'user.friends.destroy', 7, $friend->id ], 'method' => 'DELETE',
                                'class' => 'form removeFriendForm', 'id' => 'rm-'.$friend->id ]) !!}
                        <a href="/user/{{ $friend->id }}">{{ $friend->name }}</a>
                        {!! Form::submit('Unfriend', array('class' => 'btn btn-warning')) !!}
                        {!! Form::close() !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection