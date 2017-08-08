<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

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
    public function isRegister(Request $request)
    {
        $user_obj = new User();
        if(!$user_obj->isRegister($request))
            echo $this->goodJson('可以注册');
        else
            echo $this->badJson('已经被注册');
    }
    public function isVal($request)
    {
		$this->validate($request,[
			'name'=>'required|string|min:2|max:20',
			'email'=>'required|email|max:35',
			'password' =>'required|min:6|max:20',
			'repassword'=>'same:password',
			'stu_num'=>'required|min:10',
			'stu_passwd'=>'required|max:25',
			]);
    }
}
