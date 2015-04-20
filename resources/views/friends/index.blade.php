@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Friends List</h1>
                @foreach($friends as $friend)
                    <div class="box">
                        <a href="/user/{{ $friend->id }}">{{ $friend->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection