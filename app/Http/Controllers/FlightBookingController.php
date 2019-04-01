<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Flight;
use App\Payment;
use App\Passenger;
use App\FlightBook;

class FlightBookingController extends Controller
{
    public function index($flight_id)
    {
      $flightData = DB::table('flights')
                        ->where('id', $flight_id)
                        ->get();
      $user = Auth::user();

      return view('flight-book', [
        'flight' => $flightData,
        'user' => $user
      ]);
    }

    public function processBooking(Request $request)
    {
      $flightBook = new FlightBook;
      $flightBook->customer_id = Auth::user()->id;
      $flightBook->flight_id = $request->flight_id;
      $flightBook->save();

      // Passenger store
      $passenger = new Passenger;
      $passenger->passenger_customer_id = Auth::user()->id;
      $passenger->passenger_title = $request->passenger_title;
      $passenger->passenger_first_name = $request->passenger_first_name;
      $passenger->passenger_last_name = $request->passenger_last_name;
      $flightBook->passengers()->save($passenger);

      // Payment store
      $payment = new Payment;
      $payment->payment_method = $request->payment_method;
      $payment->payment_card_number = $request->payment_card_number;
      $payment->payment_name_on_card = $request->payment_name_on_card;
      $payment->payment_ccv_code = $request->payment_ccv_code;
      $flightBook->payment()->save($payment);

      session()->flash('message', 'Flight booked successfully.');
      return redirect('/home');
    }
}
