@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Welcome to StatusHub! Login to start sharing statuses!</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-10 col-md-offset-1">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-10 col-md-offset-1">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-1">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-11 col-md-offset-1">
								<button type="submit" class="btn btn-primary">Login</button>
								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>
							<div class="col-md-6 col-md-offset-4">
								<a class="btn btn-link" href="{{ url('/auth/register') }}">New here? Create an account.</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
