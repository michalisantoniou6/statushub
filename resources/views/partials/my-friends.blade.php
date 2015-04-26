<h5>Friends</h5>

@if ( ! empty($friends) )
    @foreach($friends as $key => $name)
        <div class="box">
            <a href="{{ \URL::action( 'UserController@show', [ $key ] ) }}">{{ $name }}</a>
        </div>
    @endforeach
@else
    <p>You have no friends!</p>
@endif