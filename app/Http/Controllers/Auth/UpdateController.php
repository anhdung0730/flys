<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();
        return view('auth.update', [
          'user' => $user
        ]);
    }

    public function update(Request $request)
    {
      	$user = Auth::user();

  		$validator = Validator::make($request->all(), [
  			'name' => 'required|string|max:255',
  			'dob' => 'required',
  			'gender' => 'required',
  			'phone' => 'required|digits:10',
  			'address' => 'required',
        'newPassword' => 'nullable|min:6'
  		]);

  		if ($validator->fails()) {
              return redirect()->back()->withInput($request->all())->withErrors($validator->errors());

          } else {

  		$user->name = $request->name;
  		$user->dob = $request->dob;
  		$user->gender = $request->gender;
  		$user->phone = $request->phone;
  		$user->address = $request->address;
  		if (isset($request->newPassword)) {
  			$user->password = bcrypt($request->newPassword);
  		}
  		$user->save();

  		session()->flash('message', 'Update infomation successfully.');
  		return redirect()->back();
  		}
    }

}
