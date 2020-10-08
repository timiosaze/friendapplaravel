@extends('layouts.app')

	@section('content')
		
		<section class="section">
			<div class="create-form">
				<h3>New Friend</h3>
				<form action="{{ route('friend.store') }}" method="POST">
					@csrf
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Name of friend">
					</div>
					<div class="form-group">
						<textarea name="about" id="" cols="20" rows="3" class="form-control" placeholder="About Friend"></textarea>
					</div>
					<button class="btn-primary btn float-right">Create</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</section>

		<section class="section">
			<div class="data">
				<h5>Friends</h5>
				<ul>
					@forelse ($friends as $friend)

					<li class="data-list">
						<div class="data-text">
							<h4 class="title">{{ $friend->name }}</h4>
							<p class="text-class">{{ $friend->about }}</p>
						</div>
						<div class="actions">
							<div class="row">
								<div class="col text-center">
										<a href="{{ route('friend.edit', $friend->id) }}" class="edit">Edit</a>
								</div>
								<div class="col text-center">
									<form action="{{ route('friend.destroy', $friend->id) }}" id="form{{$friend->id}}" method="POST">
										@csrf
										@method('DELETE')
										<a href="javascript:$('#form{{$friend->id}}').submit();" class="delete">Delete</a>
									</form>
								</div>
							</div>
						</div>
					</li>

					@empty

					<li class="no-data text-center">
						No friends yet.
					</li>

					@endforelse
					
					
					{{-- <li class="data-list">
						<div class="data-text">
							<h4 class="title">Awonusi Olajide</h4>
							<p class="text-class">Enim ad cupidatat officia exercitation incididunt aute voluptate incididunt quis laborum laborum labore minim voluptate quis sit dolor esse sint excepteur velit amet in dolore minim excepteur magna commodo do aute do reprehenderit ea sed.</p>
							<p class="date">October 20, 2020 | 12:14pm</p>
						</div>
						<div class="actions">
							<div class="row">
								<div class="col text-center">
									<a href="#" class="edit">Edit</a>
								</div>
								<div class="col text-center">
									<form action="">
										<a href="#" class="delete">Delete</a>
									</form>
								</div>
							</div>
						</div>
					</li>
					<li class="data-list">
						<div class="data-text">
							<h4 class="title">Awonusi Olajide</h4>
							<p class="text-class">Enim ad cupidatat officia exercitation incididunt aute voluptate incididunt quis laborum laborum labore minim voluptate quis sit dolor esse sint excepteur velit amet in dolore minim excepteur magna commodo do aute do reprehenderit ea sed.</p>
							<p class="date">October 20, 2020 | 12:14pm</p>
						</div>
						<div class="actions">
							<div class="row">
								<div class="col text-center">
									<a href="#" class="edit">Edit</a>
								</div>
								<div class="col text-center">
									<form action="">
										<a href="#" class="delete">Delete</a>
									</form>
								</div>
							</div>
						</div>
					</li> --}}
					
				</ul>
			</div>
		</section>
		<section class="section">
			<div class="paginate">
				<a href="#" class="btn btn-outline-primary">Prev</a>
				<a href="#" class="btn btn-outline-primary">Next</a>
			</div>
		</section>

	@endsection
