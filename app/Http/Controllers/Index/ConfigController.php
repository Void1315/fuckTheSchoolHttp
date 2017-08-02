<?php

namespace App\Http\Controllers\Index;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
			'stu_passwd'=>'required'
    		]);
    	$user->updateUser($request);
    	return ;
    }
}
