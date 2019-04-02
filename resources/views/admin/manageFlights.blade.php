@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Manage Flights</div>
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

                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($flights as $flight)
                          <tr>
                            <td>{{ $flight->id }}</td>
                            <td>{{ $flight->flight_code }}</td>
                            <td>{{ $flight->flight_class_id }}</td>
                            <td>{{ $flight->flight_departure_date }}</td>
                            <td>{{ $flight->flight_return_date }}</td>
                            <td>{{ $flight->flight_departure_time }}</td>
                            <td>{{ $flight->flight_arrival_time }}</td>
                            <td>{{ $flight->duration }}</td>
                            <td>{{ $flight->flight_cost }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                {{ $flights->render() }}
            </div>
        </div>
    </div>
</div>
@endsection
