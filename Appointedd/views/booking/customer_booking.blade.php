<div class="outer-div">
		{{-- display booking details of a customer --}}
		@foreach( $bookings as $booking )
			<h1>{{ $booking->{'Customer-Name'} }}</h1>
			<p> 'Starting at:' {{ $booking->start_time }}</p>
			<p> 'Ending at:' {{ $booking->end_time }}</p>
			<p> 'Staff:' {{ $booking->{'Staff-Name'} }}</p>

			{{-- route redirecting the customer to edit her booking and choose another available time --}}

			<p>
				{!! HTML::linkRoute('bookings', 'Customers') !!}
			</p>
		@endforeach
</div>	