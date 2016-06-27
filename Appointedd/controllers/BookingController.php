<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Staff;
use App\Customer;
use App\Slot;
use App\Booking;
use Input;
use Response;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function getAllBookings()
    {
    /**
     * Inner Join staff and customer tables with the pivot table(bookings) that has two foreign keys
     * to get customer name and staff name
     */
        $bookings = \DB::table('bookings')
            ->join('staffs', 'staffs.id' , '=', 'bookings.staff_id')
            ->join('customers', 'customers.id' , '=', 'bookings.customer_id')
            ->select('bookings.id',  'customers.name as Customer-Name')
            ->orderBy('customers.name', 'desc')
            ->get();
        return view('booking.index')
                ->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function createBooking()
    {
        $customers = Customer::lists('name', 'id')->toArray();
        $staffs = Staff::lists('name', 'id')->toArray();
        $startSlots = Slot::all();
        // check if start time is available 

        return view('booking.bookingHome')
            ->with('title', 'Please book a service')
            ->with('customers', $customers)
            ->with('startSlots', $startSlots)
            ->with('staffs', $staffs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function postBooking(Request $request)
    {
        /**
        * make sure that all fields are valid and not empty
        */
        $validation = Booking::validator($request->all());
            if($validation->fails()){
                 return redirect('booking')->withErrors($validation)->withInput();
        /**
        * If validation succeeds create a booking resource and store in the booking table for the customer
        */
            } else {
                $booking = new Booking;
                $booking->start_time = Input::get('start');
                $booking->end_time = Input::get('end');
                $booking->service = Input::get('service');
                $booking->customer_id = Input::get('customer');
                $booking->staff_id = Input::get('staff');
                $booking->save();
                return redirect('bookings')
                    ->with('message', 'You have successfully booked an appointment');   
            }
    }

    /**
     * Display the specified customer booking resource.
     *
     * @param  int  $id
     */
    public function showBooking($id)
    {
        $bookings = \DB::table('bookings')
            ->join('staffs', 'staffs.id' , '=', 'bookings.staff_id')
            ->join('customers', 'customers.id' , '=', 'bookings.customer_id')
            ->select('bookings.id', 'bookings.start_time', 'bookings.end_time', 'bookings.service', 'staffs.name as Staff-Name',  'customers.name as Customer-Name')
            ->where('bookings.id', $id)
            ->get();
        return view('booking.customer_booking')
            ->with('bookings', $bookings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTime($id)
    {
        $end_times = Slot::select('end_time', 'id')
                        ->where('id', '=', $id)->get();        
        return Response::json(['success' => 'true', 'end_times' => $end_times]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
