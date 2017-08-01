<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
    	$user = new User();
		if($request->isMethod('post'))
		{
			$this->isVal($request);
		    return $user->inUser($request);
		}
		return view('auth/sign');
		
    	
    }
    protected function isVal($request)
    {
    	$this->validate($request, [
	        'email' => 'required|max:100|email',
	        'password'=> 'required|max:25|min:6'
	    ]);
    }
}
