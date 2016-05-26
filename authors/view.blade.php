@extends('layouts.default')

@section('content')
	<h1>{{ $author->name }}</h1>

	<p>{{ $author->bio }}</p>

	<p><small>{{ $author->updated_at }}</small></p>

	<p>
		{!! HTML::linkRoute('authors', 'Authors') !!} |
		{!! HTML::linkRoute('edit_author', 'Edit', [$author->id]) !!}
	</p>
@endsection