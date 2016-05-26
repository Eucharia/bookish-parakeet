@extends('layouts.default')

@section('content')
	<h1>{{ $title }}</h1>
	
	 @include('comments.authors_errors')
	
	{!! Form::open(['url' => 'author/create', 'method' => 'POST']) !!}

		<p>
			{!! Form::label('name', 'Name:') !!}<br/>	
			{!! Form::text('name', Input::old('name')) !!}
		</p>

		<p>
			{!! Form::label('bio', 'Biography:') !!}<br/>	
			{!! Form::textarea('bio', Input::old('bio')) !!}
		</p>

		<p>{!! Form::submit('Add Author') !!}</p>

	{!! Form::close() !!}
@endsection