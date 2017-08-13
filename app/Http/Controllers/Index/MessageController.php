<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Message;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    //
    public function index()
    {
    	$obj = new Message();
    	$message = $obj->getAllMessage();
    	return view('index.message')->with('nav',$this->navSelect('message'))
    	->with('user',Auth::user())->with('messages',$message);
    }
    public function addMessage (Request $request)
    {
		$validata = Validator::make($request->all(),['title'=>'required|max:15','text'=>'required|max:120'],['required' => ':attribute为空','max'=>':attribute字符过长'],['title'=>'标题','text'=>'内容']);
		if($validata->fails())
		{
			return redirect()->back()->withErrors($validata)->withInput();
		}
		$obj = new Message();
		$message = ['u_id'=>Auth::id(),'title'=>$request->title,'content'=>$request->text];
		$obj->addMessage($message);
		return redirect()->back();
    }
}
