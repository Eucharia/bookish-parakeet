@extends('layouts.default')

@section('content')
	<h1> Donation Home Page</h1>

	<div id="donation-page">
		<ul>
			@foreach( $donators as $donator )
				<li>{!! HTML::linkRoute('news', $donator->name, $donator->id) !!}</li>
			@endforeach
		</ul>
	</div>
	<div id="footer-div">
		<p>{!! HTML::linkRoute('add_new', 'New Author') !!}</p>
	</div>
	
@endsection