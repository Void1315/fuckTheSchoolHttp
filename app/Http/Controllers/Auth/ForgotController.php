<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
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
		$obj_ = new User();
		session(['token_email'=>$email]);
		if(User::where('email',$email)->where('stu_num',$stunum)->first())
		{
			while(!$obj_->setCode($email,session(['code'=>time()])))
			{}
			Mail::to($email)->send(new OrderShipped(1));//发送邮件
			echo $this->goodJson('成功');
		}
		else
		{
			echo $this->badJson('邮箱与学号不符合');
		}
	}
	public function reset(Request $request)//重置密码页面
	{
		$obj_ = new User();
		try{
			if($obj_->isCode($request->email,decrypt($request->code)))
			{
				return view('auth/reset')->with('email',$request->email)->with('code',$request->code);
			}
			else
			{
				return redirect('/forgot')->withErrors('验证码已过期');
			}
		}catch (DecryptException $e) 
		{
			return redirect('/forgot')->withErrors('验证码已过期');
		}
	}
	public function resetPassword(Request $request)//表单验证
	{
		$obj = new User();
		try{
			if(!$obj->isCode($request->email,decrypt($request->code)))
			{
				return redirect()->back()->withErrors('身份验证出错了');
			}
		}catch(DecryptException $e)
		{
			return redirect()->back()->withErrors('身份验证出错了');
		}
		$this->validate($request, [
		        'password' => 'required|min:6|max:20',
		        'repassword'=>'required|same:password'
		    ]);
		return $obj->updatePaswd($request->email,$request->password);
	}
}
