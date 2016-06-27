<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>  
        <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <script type="text/javascript" href="{{ URL::asset('js/jquery-3.0.0.min.js')}}"></script> 
        <script type="text/javascript" href="{{ URL::asset('js/jquery.min.js')}}"></script> 
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://localhost/laravel/public/js/bootstrap.min.js"></script>
        <div id="booking_title">
            <h1>{{ $title }}</h1>
        </div>
        
        @if(Session::has('message'))
            <p style="color: green;">{{ Session::get('message') }}</p>
        @endif
        <div id="error">
            @if(count($errors) > 0 )
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            @endif
        </div>
        
        {!! Form::open(['url' => 'booking/success', 'action' => 'BookingController@postBooking']) !!}
            <div class="form-div">
                <div class="form-group customer-label">
                    {!! Form::label('customer', 'Customer:') !!}   
                    {!! Form::select('customer', $customers + ['optional' => 'Select your name'], null, ['class' => 'customer_class']) !!}
                </div>

                <div class="form-group staff-label">
                    {!! Form::label('staff', 'Staff-Name:') !!}   
                    {!! Form::select('staff', $staffs + ['optional' => 'Choose a Staff'], null, ['class' => 'staff_class']) !!}
                </div>

                <div class="form-group start time-label">
                    {!! Form::label('start', 'Start-Time:') !!}
                    <select name="start" class="start_class" id="start">
                        <option value="0">Please your start time select</option>
                    @foreach($startSlots as $startSlot)
                        <option value="{{$startSlot->start_time}}">{{$startSlot->start_time}}</option>>
                    @endforeach
                    </select>
                </div>

                <div class="form-group end time-label">
                    {!! Form::label('end', 'End-Time:') !!} 
                    <select id="end-time" name="end">
                    </select> 
                </div>

                <div class="form-group service-label">
                    {!! Form::label('service', 'Service:') !!}   
                    {!! Form::text('service', 'Hair Cut', ['class' => 'service_class']) !!}
                </div>

                <div class="form-group submit"> 
                    <p>{!! Form::Submit('Submit Booking', ['class' => 'btn btn-primary btn-lg']) !!}</p>
                </div>

            </div>

        {!! Form::close() !!}

        <script type="text/javascript">
            $(document).ready(function() {
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                    $(document).on('change', 'select#start.start_class', function() {

                        // selected start time slot

                        var idValue = $("#start.start_class :selected").val();

                        // geting all the time slot in the form and using it to determine the end time slot to avoid a customer having more than one hour service
                        
                        var startSlots = ['09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00'];
                        idValue = startSlots.indexOf(idValue) + 1;
                        $.get('booking' + '/' + idValue, {option: $(this).val() }, 

                          function(data) {
                            if (data.success) {
                              var endTime = $('select#end-time');
                              endTime.empty();
                                $.each(data.end_times, function(key, value){
                                   endTime.append('<option value="' + value.end_time + '">' + value.end_time  + '</option>');
                                });
                            } else{
                              alert('Failed to load file');
                            }        
                        }, 'json');
                            
                    });
                });
        </script>
    </body>
</html>