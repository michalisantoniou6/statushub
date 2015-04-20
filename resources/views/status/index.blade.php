@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach($statuses as $status)
                <blockquote>
                    <p>{{ $status['status'] }}</p>
                </blockquote>
            @endforeach
        </div>
    </div>
</div>
@endsection