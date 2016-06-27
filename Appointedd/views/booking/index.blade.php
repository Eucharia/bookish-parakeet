 <!DOCTYPE html HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Customer bookings</title>
	</head>
	<body>
		<h1>Customers Booking</h1>
			<div class="outer-div">
				{{-- display names of all customers that have successfully booked for a servive --}}
				@foreach( $bookings as $booking )
					<div id="customer-class">
						<th id="cust-name">
							<td>{!! HTML::linkRoute('booking_id', $booking->{'Customer-Name'}, $booking->id) !!}</td>
						</th>
					</div>
				@endforeach
			</div>
			{{-- route redirecting the customer to make a new booking--}}

			
		<p>{!! HTML::linkRoute('booking_new', 'New Booking') !!}</p>

	</body>
</html> 