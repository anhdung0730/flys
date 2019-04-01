<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightBook extends Model
{
    public function payment()
    {
      return $this->hasOne(Payment::class, 'payment_flight_book_id');
    }

    public function passengers()
    {
      return $this->hasMany(Passenger::class, 'passenger_flight_book_id');
    }

    public function user()
    {
      return $this->beLongsTo(User::class);
    }
}
