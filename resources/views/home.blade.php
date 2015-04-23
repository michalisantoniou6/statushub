@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			{!! Form::open([ 'route' => [ 'user.status.store', $authUserId ], 'class' => 'form']) !!}

			{!! Form::text( 'status', null, [
				'required',
				'data-bind' => "textInput: newStatus",
				'class'=>'form-control',
				'placeholder'=>'Type your status here'
			]) !!}

			{!! Form::submit( 'Post status', [
				'data-bind' => 'click: addStatus'
			]) !!}

			{!! Form::close() !!}

			<ul data-bind="foreach: statusesFromDb">
				<blockquote data-bind="text: status"></blockquote>
			</ul>

		</div>
	</div>
</div>
@endsection
