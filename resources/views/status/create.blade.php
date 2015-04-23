@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {!! Form::open([ 'route' => [ 'user.status.store', $authUserId ], 'class' => 'form']) !!}

                <div class="form-group">
                    <h1>Say something...</h1>
                    {!! Form::textarea( 'status', null, [
                        'required',
                        'class'=>'form-control',
                        'placeholder'=>'Type your status here',
                    ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Publish Status',
                    [ 'class'=>'btn btn-primary' ]) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection