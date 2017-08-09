<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\User;
class ForgotController extends Controller
{
    //
	public function index(Request $request)
	{
		if($request->isMethod('post'))
		{
			$this->validate($request, [
		        'email' => 'required|max:35|email',
		        'stu_num'=>'required|min:10'
		    ]);
		    return $this->forgotVal($request->email,$request->stu_num);
		}
		return view('auth/forgot');
	}
	protected function forgotVal($email,$stunum)//验证逻辑
	{
		if(User::where('email',$email)->where('stu_num',$stunum)->first())
		{
			// Mail::to($email)->send(new OrderShipped(1));//发送邮件
			// $code = session($email);//获取验证码
			echo $this->goodJson('成功');
		}
		else
		{
			echo $this->badJson('邮箱与学号不符合');
		}
		
	}
	public function reset(Request $request)//重置密码页面
	{
		if($request->isMethod('post'))
		{

		}
		return view('auth/reset');
	}
}
