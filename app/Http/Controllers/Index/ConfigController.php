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
        $user = new User();
        $this->validate($request,[
            'stu_passwd'=>'required|max:25',
            ]);
        $user->updateUser($request);
        return ;
    }
    public function auth(Request $request)//验证用户密码
    {
        $user = new User();
        $pass = $request->input('passwd');
        $hashedPassword = $user->getPasswd();
        $stu_pass = $user->getStuPasswd();
        if (Hash::check($pass, $hashedPassword)) 
        {
            echo $stu_pass;
        }
        else
        {
            return new JsonResponse(['name'=>'密码错误!'],422);
        }
    }
}
