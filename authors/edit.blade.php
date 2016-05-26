@extends('layouts.default')

@section('content')
	<h1> Editing ... {{ $author->name }}</h1>

	 @include('comments.authors_errors')

	{!! Form::open(['url' => 'author/update', 'method' => 'PUT']) !!}

		<p>
			{!! Form::label('name', 'Name:') !!}<br/>	
			{!! Form::text('name', $author->name) !!}
		</p>

		<p>
			{!! Form::label('bio', 'Biography:') !!}<br/>	
			{!! Form::textarea('bio', $author->bio) !!}
		</p>

		{!! Form::hidden('id', $author->id) !!}

		<p>{!! Form::submit('Update Author') !!}</p>

	{!! Form::close() !!}
@endsection