@extends('layouts.app')

	@section('content')
		
		<section class="section">
			<div class="create-form">
				<h3>New Friend</h3>
				@include('includes.validation')
				@include('includes.alerts')
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
										<a href="#" data-toggle="modal" data-target="#staticBackdrop{{$friend->id}}" class="delete">Delete</a>
								</div>
							</div>
						</div>
					</li>
					<!-- Modal -->
					<div class="modal fade " id="staticBackdrop{{$friend->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Delete Friend</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
							{{ Str::limit($friend->about, 15) }}
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								<form action="{{ route('friend.destroy', $friend->id) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-primary">Yes</button>
								</form>
							</div>
						</div>
						</div>
					</div>
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
			{{$friends->links()}}
		</section>

	@endsection
