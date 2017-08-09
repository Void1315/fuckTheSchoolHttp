<?php

namespace App\Http\Controllers\Index;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class ConfigController extends Controller
{
    public function index(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		return $this->saveData($request);
    	}
    	return view('index.config')
    	->with('nav',$this->navSelect('cofig'))->with('user',Auth::user());
    }

    protected function saveData($request)
    {
    	$user = new User();
    	$this->validate($request,[
    		'name'=>'required|string|max:20',
			'stu_num'=>'required|min:10',
    		]);
    	$user->updateUser($request);
    	return ;
    }
    public function stuPasswd(Request $request)
    {
        if(session(Auth::id()))
        {
            $user = new User();
            $this->validate($request,[
                'stu_passwd'=>'required|max:25',
                ]);
            $user->updateUser($request);
            return ;
        }
       else
       {
            echo $this->badJson('请先完成验证');
            return ;
       }
    }
    public function auth(Request $request)//验证用户密码
    {
        $user = new User();
        $stu_pass = $user->getStuPasswd();
        if($request->isMethod('get'))
        {
             $this->isAuth($stu_pass);
             return ;
        }     
        $pass = $request->input('passwd');
        $hashedPassword = $user->getPasswd();
        if (Hash::check($pass, $hashedPassword)) 
        {
            session([Auth::id()=>1]);//开启后台
            echo $this->goodJson($stu_pass);
        }
        else
        {
            echo $this->badJson('密码错误');
            return ;
        }
    }
    public function isAuth($stu_pass)
    {
        if(session(Auth::id()))
        {
            echo $this->goodJson(['code'=>$stu_pass]);
            return true;
        }
        else
        {
            echo $this->badJson('未验证，请先完成验证');
            return false;
        }
    }
}
