@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Make Some Friends</h1>

            @foreach($allUsers as $user)
                    {!! Form::open(['route' => 'user.friends.store', 'class' => 'form']) !!}

                    <div class="form-group">
                        <a href="{{ \URL::action('UserController@show', [ $user['id'] ]) }}">{{ $user['name'] }} </a>
                        {!! Form::hidden('friendId', $user['id']) !!}

                        {!! Form::submit('Add Friend',
                        array('class'=>'btn btn-primary')) !!}
                    </div>
                    {!! Form::close() !!}
                @endforeach
            </div>
        </div>
    </div>
@endsection