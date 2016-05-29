@extends('layouts.default')

@section('content')
	<h1>Try uploading your documents here</h1>
	@if(count($errors))
	<ul>
		@foreach($errors->all() as $error)
			<li> {{ $error }} </li>
		@endforeach
	</ul>
	@endif

	<ul>
		@foreach($files as $file)
			<li> {{ $file->filename }} | {!! HTML::linkRoute('deleted', 'Delete File', $file->id) !!} </li>
		@endforeach
	</ul>
	
	{!! Form::open(['url' => '/handleUpload', 'files' => true]) !!}

		{!! Form::file('file') !!}<br/>
		{!! Form::token() !!}<br/>
		{!! Form::submit('Upload file') !!}<br/><br/>



	{!! Form::close() !!}

@endsection