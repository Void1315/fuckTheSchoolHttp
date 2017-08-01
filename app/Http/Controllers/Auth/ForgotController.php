<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotController extends Controller
{
    //
	public function index(Request $request)
	{
		if($request->isMethod('post'))
		{
			$this->validate($request, [
		        'email' => 'required|max:100|email'
		    ]);
		}
		return view('auth/forgot');
	}
}
