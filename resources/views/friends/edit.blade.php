@extends('layouts.app')

	@section('content')
		<section class="section">
			<div class="create-form">
				<h3>Edit Friend</h3>
				@include('includes.validation')
				<form action="{{route('friend.update', $friend->id)}}'" method="POST">
					@csrf
					@method('PUT')
					<div class="form-group">
						<input type="text" class="form-control" name="name" value="{{$friend->name}}e">
					</div>
					<div class="form-group">
						<textarea name="about" id="" cols="20" rows="3" class="form-control">{{$friend->about}}</textarea>
					</div>
					<button class="btn-primary btn float-right">Update</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</section>

		
	@endsection