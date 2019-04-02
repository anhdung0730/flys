<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $airports = DB::table('airports')->get();
      $flightClasses = DB::table('flight_classes')->get();
      return view('index', [
        'airports' => $airports,
        'flightClasses' => $flightClasses
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airports = DB::table('airports')->get();
        $airplanes = DB::table('airplanes')->get();
        $flightClasses = DB::table('flight_classes')->get();
        return view('admin.create-flight', [
          'airports' => $airports,
          'airplanes' => $airplanes,
          'flightClasses' => $flightClasses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'from' => 'required|different:to'
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator->errors())
                        ->withInput();
        } else {
          $input = $request->all();

          $flights = DB::table('flights')
                              ->join('airplanes', 'flights.flight_airplane_id', 'airplanes.id')
                              ->join('airports as airport_from', 'flights.flight_airport_from_id', 'airport_from.id')
                              ->join('airports as airport_to', 'flights.flight_airport_to_id', 'airport_to.id')
                              ->select(
                                'flights.*',
                                'airplanes.airplane_name',
                                'airport_from.airport_code as airport_from_code',
                                'airport_from.city_name as city_from',
                                'airport_to.airport_code as airport_to_code',
                                'airport_to.city_name as city_to'
                              );

          $flights->where('flight_class_id', '=', $input['flight-class']);
          $flights = $flights->where('flight_type', '=', $input['flight_type']);
          $flights->where('flight_airport_from_id', '=', $input['from']);
          $flights->where('flight_airport_to_id', '=', $input['to']);

          // Check if departure-date is selected
          if (isset($input['departure-date'])) {
            $flights = $flights->where('flight_departure_date', '=', $input['departure-date']);
          } else {
            $flights = $flights->where('flight_departure_date', '>=', now());
          }
          // Check if return-date is selected
          if (isset($input['departure-date'])) {
            $flights = $flights->where('flight_return_date', '=', $input['return-date']);

          }

          // Paginate
          $flights = $flights->paginate(2);
          $flights->appends(request()->input())->links();

          $airports = DB::table('airports')->get();
          $airport_from = $airports[$input['from'] - 1];
          $airport_to = $airports[$input['to'] - 1];

          return view('flight-list', [
            'input' => $input,
            'flights' => $flights,
            'airport_from' => $airport_from,
            'airport_to' => $airport_to
          ]);
        }
    }
}
