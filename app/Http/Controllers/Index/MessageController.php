<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Message;
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
}
