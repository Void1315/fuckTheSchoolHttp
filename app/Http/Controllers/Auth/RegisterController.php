<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function index(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		$this->isVal($request);#看看值是否合理
    		$user_obj = new User();
    		$user_obj->register($request);
            Mail::to($request->user())->send(new OrderShipped(0));
            return view('index/index');
    	}
    	return view('auth/register');
    }
    public function isVal($request)
    {
		$this->validate($request,[
			'name'=>'required|string|max:20',
			'email'=>'required|email|max:35',
			'password' =>'required|min:6|max:20',
			'repassword'=>'same:password',
			'stu_num'=>'required|min:10',
			'stu_passwd'=>'required|max:25',
			]);
    }
}
