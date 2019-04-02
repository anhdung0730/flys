<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function manageFlights()
    {
      $flights = DB::table('flights')->paginate(5);
      return view('admin.manageFlights', [
        'flights' => $flights
      ]);
    }

}
