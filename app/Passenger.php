<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    public function flightBook()
    {
      return $this->beLongsTo(FlightBook::class);
    }

    public function user()
    {
      return $this->beLongsTo(User::class);
    }
}
