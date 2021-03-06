@extends('layouts.master')
@section('title')
	Sign UP
@endsection
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Sign Up</h1>
		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
			<div class="alert alert-danger">
				<li>{{ $error }}</li>
			</div>
			@endforeach
		@endif
		<form action="{{ route('user.signup') }}" method="POST" role="form">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="email">Name</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			
		</form>
	</div>
</div>
@endsection