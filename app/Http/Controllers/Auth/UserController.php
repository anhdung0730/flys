<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\User;
use App\FlightBook;
use App\Passenger;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        return view('auth.update', [
          'user' => $user
        ]);
    }

    public function update(Request $request)
    {
      	$user = Auth::user();

  		$validator = Validator::make($request->all(), [
  			'name' => 'required|string|max:255',
  			'dob' => 'required',
  			'gender' => 'required',
  			'phone' => 'required|digits:10',
  			'address' => 'required',
        'newPassword' => 'nullable|min:6'
  		]);

  		if ($validator->fails()) {
              return redirect()->back()->withInput($request->all())->withErrors($validator->errors());

          } else {

  		$user->name = $request->name;
  		$user->dob = $request->dob;
  		$user->gender = $request->gender;
  		$user->phone = $request->phone;
  		$user->address = $request->address;
  		if (isset($request->newPassword)) {
  			$user->password = bcrypt($request->newPassword);
  		}
  		$user->save();

  		session()->flash('message', 'Update infomation successfully.');
  		return redirect()->back();
  		}
    }

    public function manageFlightBooks()
    {
      $user = Auth::user();
      $flightBooksList = DB::table('flight_books')->where('flight_books.customer_id', '=', $user->id)
                                                  ->join('flights', 'flight_books.flight_id', 'flights.id')
                                                  ->select([
                                                    'flight_books.id',
                                                    'flights.flight_code',
                                                    'flights.flight_class_id',
                                                    'flights.flight_departure_date',
                                                    'flights.flight_return_date',
                                                    'flights.flight_departure_time',
                                                    'flights.flight_departure_time',
                                                    'flights.flight_arrival_time',
                                                    'flights.duration',
                                                    'flights.flight_cost',
                                                  ])
                                                  ->get();
      return view('auth.manageFlightBooks', [
        'flightBooksList' => $flightBooksList
      ]);
    }

    public function detailsFlightBook($flight_book_id)
    {
      $user = Auth::user();
      $flightBook = DB::table('flight_books')->where('flight_books.customer_id', '=', $user->id)
                                             ->where('flight_books.id', '=', $flight_book_id)
                                             ->join('flights', 'flight_books.flight_id', 'flights.id')
                                             ->select([
                                               'flight_books.id',
                                               'flights.flight_code',
                                               'flights.flight_class_id',
                                               'flights.flight_departure_date',
                                               'flights.flight_return_date',
                                               'flights.flight_departure_time',
                                               'flights.flight_arrival_time',
                                               'flights.duration',
                                               'flights.flight_cost',
                                             ])
                                             ->get();

      $passengers = Passenger::find($flight_book_id)->where('passengers.passenger_customer_id', '=', $user->id)->get();
      return view('auth.detailsFlightBook', [
        'flightBook' => $flightBook,
        'passengers' => $passengers
      ]);
    }

    public function deleteFlightBook($id)
    {

      $flightBook = DB::table('flight_books')->where('id', $id);
      $flightBook->delete();

      $payment = DB::table('payments')->where('payment_flight_book_id', $id);
      $payment->delete();

      $passengers = DB::table('passengers')->where('passenger_flight_book_id', $id);
      $passengers->delete();
      return back();
    }
}
