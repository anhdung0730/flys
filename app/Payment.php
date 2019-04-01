<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function flightBook()
    {
      return $this->beLongsTo(FlightBook::class);
    }
}
