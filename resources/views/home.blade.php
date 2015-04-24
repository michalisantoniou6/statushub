@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">

			{!! Form::open([ 'route' => [ 'user.status.store', $authUserId ], 'class' => 'form']) !!}

			{!! Form::label('How ya feelin today?') !!}

			{!! Form::text( 'status', null, [
				'required',
				'data-bind' => "textInput: newStatus",
				'class'=>'form-control',
				'placeholder'=>'Type your status here'
			]) !!}

			{!! Form::submit( 'Post status', [
				'class' => 'pull-right',
				'data-bind' => 'click: addStatus'
			]) !!}

			{!! Form::close() !!}

		<div class="clearfix"></div>

		<h4>Status history</h4>
		<div data-bind="foreach: statusesFromDb">
			<blockquote>
				<p class="status" data-bind="text: status"></p>
				<small class="pull-right" data-bind="text: createdAt"></small>
			</blockquote>
		</div>

		</div>
	</div>
</div>
@endsection
