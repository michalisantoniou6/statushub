@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Friends List</h1>
                @foreach($friends as $friend)
                    <div class="box">
                        <a href="/user/{{ $friend->id }}/status">{{ $friend->name }}</a>

                        {!! Form::open(['route' => [ 'user.friends.destroy', $authUserId, $friend->id ], 'method' => 'DELETE', 'class' => 'form']) !!}
                        {!! Form::submit('Unfriend', array('class' => 'btn btn-warning')) !!}
                        {!! Form::close() !!}


                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection