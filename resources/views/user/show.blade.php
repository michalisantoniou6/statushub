@extends('app')

@section('content')
<div class="container">
        <div class="row">

                <div class="col-md-6 col-md-offset-1">
                        <h2>{{ $name }}'s Profile</h2>
                        @include('partials/profile-statuses')
                </div>

                <div class="col-md-3 col-md-offset-1">
                        <div class="friends">
                                @include('partials/my-friends')
                        </div>

                </div>

        </div>
</div>
@endsection