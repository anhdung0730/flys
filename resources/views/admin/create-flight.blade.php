@extends('layouts.app')

@section('content')
  <div class="container">
    <section>
      <h3>Create new Flight</h3>
      <div class="panel panel-default">
        <div class="panel-body">
          @if(session()->has('message'))
            <div class="alert alert-success">
              <b>{{ session()->get('message') }}</b>
            </div>
          @endif

          <form action="" name="createFlight" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-3">
                <div class="form-group form-inline">
                  <label class="control-label">Flight Class:</label>
                  <div class="row">
                    <div class="col-md-3">
                      <select class="form-control" name="flightClass">
                        @foreach ($flightClasses as $flightClass)
                          <option value="{{ $flightClass->id }}">{{ $flightClass->flight_class_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Flight Type:</label>
                  <div class="radio">
                    <label><input type="radio" name="flight_type" checked value="1">One Way</label>
                    <label><input type="radio" name="flight_type" value="2">Return</label>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Flight Code:</label>
                  <input type="text" name="flight_code" class="form-control" value="">
                </div>
                <div class="form-group form-inline">
                  <label class="control-label">Airplane:</label>
                  <div class="row">
                    <div class="col-md-3">
                      <select class="form-control" name="airplane">
                        @foreach ($airplanes as $airplane)
                          <option value="{{ $airplane->id }}">{{ $airplane->airplane_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group form-inline">
                  <label class="control-label">Departure Airport:</label>
                  <div class="row">
                    <div class="col-md-3">
                      <select class="form-control" name="flight_airport_from">
                        @foreach ($airports as $airport)
                          <option value="{{ $airport->id }}">{{ $airport->city_name }} ({{ $airport->airport_code }})</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group form-inline">
                  <label class="control-label">Arrival Airport:</label>
                  <div class="row">
                    <div class="col-md-3">
                      <select class="form-control" name="flight_airport_to">
                        @foreach ($airports as $airport)
                          <option value="{{ $airport->id }}">{{ $airport->city_name }} ({{ $airport->airport_code }})</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Departure Date: </label>
                  <input type="date" name="departure-date" class="form-control col-xs-2" value="{{ date("Y-m-d") }}" placeholder="Choose Departure Date">
                </div>
                <div class="form-group">
                  <label class="control-label">Return Date: </label>
                  <input type="date" name="return-date" class="form-control col-xs-2" value="{{ date("Y-m-d") }}" placeholder="Choose Return Date">
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" value="submit" class="btn btn-lg btn-primary btn-block">Save</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
@endsection
