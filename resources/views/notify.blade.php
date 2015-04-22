@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Message</div>

					<div class="panel-body">
						{{ $message }}

						@if ($errors->any())
							<ul class="alert alert-danger">
								@foreach ($errors->all() as $error)
									{{ $error }}
								@endforeach
							</ul>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
