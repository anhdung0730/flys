@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Flight Books</div>
          <div class="panel-body">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Flight Code</th>
                  <th>Flight Class</th>
                  <th>Departure date</th>
                  <th>Return date</th>
                  <th>Departure datetime</th>
                  <th>Arrival datetime</th>
                  <th>Duration</th>
                  <th>Flight Cost</th>
                  <th>Details</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($flightBooksList as $flightBook)
                  <tr>
                    <td>{{ $flightBook->id }}</td>
                    <td>{{ $flightBook->flight_code }}</td>
                    <td>{{ $flightBook->flight_class_id }}</td>
                    <td>{{ $flightBook->flight_departure_date }}</td>
                    <td>{{ $flightBook->flight_return_date }}</td>
                    <td>{{ $flightBook->flight_departure_time }}</td>
                    <td>{{ $flightBook->flight_arrival_time }}</td>
                    <td>{{ $flightBook->duration }}</td>
                    <td>{{ $flightBook->flight_cost }}</td>
                    <td><a type="button" href="{{ route('user.detailsFlightBook', ['flight_book_id' => $flightBook->id]) }}" class="btn btn-info form-group">Details</a></td>
                    <td><a type="button" href="{{ route('user.deleteFlightBook', ['flight_book_id' => $flightBook->id]) }}" class="btn btn-danger">Delete</a></td>
                  </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
