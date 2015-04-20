@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {!! Form::open(['route' => 'user.status.update', 'class' => 'form']) !!}

                <div class="form-group">
                    {!! Form::label('Status') !!}
                    {!! Form::textarea(
                    'status',
                    isset($status) ? $status : '',
                    [
                    'required',
                    'class'=>'form-control',
                    'placeholder'=>'Type your status here',
                    ]
                    ) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update Status',
                    [ 'class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection