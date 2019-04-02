@extends('layouts.app')

@section('content')
  <main>
          <div class="container">
              <h2>Booking</h2>
              <div class="row">
                  <div class="col-md-8">
                      <form action=" {{ route('processBooking', ['flight_id' => $flight[0]->id]) }}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="flight_id" value="{{ $flight[0]->id }}">
                          <section>
                              <h3>Contact Information</h3>
                              @if (isset($user))
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label class="control-label">
                                                    Fullname:
                                                </label>
                                                <input type="text" class="form-control" value="{{$user->name}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Contact's Mobile phone number
                                                </label>
                                                <input type="tel" class="form-control" value="{{$user->phone}}" disabled>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">
                                                    Contact's email address
                                                </label>
                                                <input type="email" class="form-control" value="{{$user->email}}" disabled>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                @else
                                  <div class="panel panel-default">
                                      <div class="panel-body">
                                          <div class="form-group row">
                                              <div class="col-sm-12">
                                                  <label class="control-label">
                                                      Fullname:
                                                  </label>
                                                  <input type="text" class="form-control" value="" disabled>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="col-sm-6">
                                                  <label class="control-label">
                                                      Contact's Mobile phone number
                                                  </label>
                                                  <input type="tel" class="form-control" value="" disabled>
                                              </div>
                                              <div class="col-sm-6">
                                                  <label class="control-label">
                                                      Contact's email address
                                                  </label>
                                                  <input type="email" class="form-control" value="" disabled>
                                              </div>
                                          </div>
                                          <div class="text-right">
                              @endif
  										<button type="button" class="btn btn-default">Clear all</button>
                                          <button type="button" class="btn btn-default">Reset</button>
                                      </div>
                                  </div>
                              </div>
                          </section>
                          <section>
                              <h3>Passenger(s) Details</h3>
                              <div class="panel panel-default">
                                  <div class="panel-body">
                                      <h4>Passenger #1</h4>
                                      <div class="form-group row">
                                          <div class="col-sm-3">
                                              <label class="control-label">Title:</label>
                                              <select class="form-control" name="passenger_title">
                                                  <option value="Mr">Mr.</option>
                                                  <option value="Mrs">Mrs.</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-6">
                                              <label class="control-label">First Name:</label>
                                              <input type="text" class="form-control" name="passenger_first_name">
                                          </div>
                                          <div class="col-sm-6">
                                              <label class="control-label">Last Name:</label>
                                              <input type="text" class="form-control" name="passenger_last_name">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>
                          <section>
                              <h3>Price Details</h3>
                              <div>
                                  <h5>
                                      <strong class="airline">Qatar Airways</strong>
                                      <p><span class="flight-class">Economy</span></p>
                                  </h5>
                                  <ul class="list-group">
                                      <li class="list-group-item">
                                          <div class="pull-left">
                                              <strong>Passengers Fare (x3)</strong>
                                          </div>
                                          <div class="pull-right">
                                              <strong>VND {{$flight[0]->flight_cost}}</strong>
                                          </div>
                                          <div class="clearfix"></div>
                                      </li>
                                      <li class="list-group-item">
                                          <div class="pull-left">
                                              <span>Tax</span>
                                          </div>
                                          <div class="pull-right">
                                              <span>Included</span>
                                          </div>
                                          <div class="clearfix"></div>
                                      </li>
                                      <li class="list-group-item list-group-item-info">
                                          <div class="pull-left">
                                              <strong>You Pay</strong>
                                          </div>
                                          <div class="pull-right">
                                              <strong>VND {{$flight[0]->flight_cost}}</strong>
                                          </div>
                                          <div class="clearfix"></div>
                                      </li>
                                  </ul>
                              </div>
                          </section>
                          <section>
                              <h3>Payment</h3>
                              <div class="panel panel-default">
                                  <div class="panel-body">
                                      <div class="form-group">
                                          <label class="control-label">
                                              Payment Method:
                                          </label>
                                          <select class="form-control" name="payment_method">
                                              <option value="Transfer">Transfer</option>
                                              <option value="Credit Card">Credit Card</option>
                                              <option value="Paypal">Paypal</option>
                                          </select>
                                      </div>
                                      <h4>Credit Card</h4>
                                      <div class="form-group">
                                          <label class="control-label">Card Number</label>
                                          <input type="number" class="form-control" placeholder="Digit card number" name="payment_card_number">
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-10">
                                              <label class="control-label">Name on card:</label>
                                              <input type="text" class="form-control" name="payment_name_on_card">
                                          </div>
                                          <div class="col-sm-2">
                                              <label class="control-label">CCV Code:</label>
                                              <input type="number" maxlength="3" class="form-control" placeholder="Digit CCV" name="payment_ccv_code">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </section>
                          <section>
                              <div class="text-right">
                                  <button type="submit" class="btn btn-primary">
                                      Continue to Booking
                                  </button>
                              </div>
                          </section>
                      </form>
                  </div>
                  <div class="col-md-4">
                      <h3>Flights</h3>
                      <aside>
                          <article>
                              <div>
                                  <ul class="list-group">
                                      <li class="list-group-item">
                                          <h5>
                                              <strong class="airline">Qatar Airways QR-957</strong>
                                              <p><span class="flight-class">Economy</span></p>
                                          </h5>
                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="row">
                                                      <div class="col-sm-4">
                                                          <div><big class="time">18:45</big></div>
                                                          <div><small class="date">29 Apr 2017</small></div>
                                                      </div>
                                                      <div class="col-sm-6">
                                                          <div><span class="place">Jakarta (CGK)</span></div>
                                                          <div><small class="airport">Soekarno Hatta Intl Airport</small></div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                          </article>
                      </aside>
                  </div>
              </div>
          </div>
          <br>
      </main>
@endsection
