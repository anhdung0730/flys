@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Flight Book Details</div>
          <div class="panel-body">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <div class="row">
              @foreach ($flightBook as $details)

              @endforeach
              <div class="col-md-6">
                <h4>Flight Code: <b>{{ $details->flight_code }}</b></h4>
                <h4>Flight Class: <b>{{ $details->flight_class_id }}</b></h4>
                <h4>Flight Cost: <b>{{ $details->flight_cost }}</b></h4>
              </div>
              <div class="col-md-6">
                <h4>Flight Departure date: <b>{{ $details->flight_departure_date }}</b></h4>
                <h4>Flight Return date: <b>{{ $details->flight_return_date }}</b></h4>
                <h4>Departure datetime: <b>{{ $details->flight_departure_time }}</b></h4>
                <h4>Arrival datetime: <b>{{ $details->flight_arrival_time }}</b></h4>
                <h4>Duration: <b>{{ $details->duration }}</b></h4>
              </div>

              <div class="col-md-12">
                <h3>Passengers</h3>
                <table class="table table-hover">
                  <thead>
                    <th>No.</th>
                    <th>Title</th>
                    <th>First name</th>
                    <th>Last name</th>
                  </thead>
                  <tbody>
                    @foreach ($passengers as $passenger)
                      <td>{{ $passenger->id }}</td>
                      <td>{{ $passenger->passenger_title }}</td>
                      <td>{{ $passenger->passenger_first_name }}</td>
                      <td>{{ $passenger->passenger_last_name }}</td>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
