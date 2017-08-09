<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use App\User;
use Illuminate\Support\Facades\Auth;

require_once dirname(dirname(__FILE__)) . '\Auth\class.geetestlib.php';


class LoginController extends Controller
{
    //
    public function index(Request $request)
    {
    	$user = new User();
		if($request->isMethod('post'))
		{
            if(!$this->isGeet($request))
                return redirect()->route('login')->withErrors('验证失败!');
			$this->isVal($request);
		    return $user->inUser($request);
		}
		return view('auth/sign');
    }
    public function logout(Request $request)
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
    protected function isVal($request)
    {
    	$this->validate($request, [
	        'email' => 'required|max:100|email',
	        'password'=> 'required|max:25|min:6'
	    ]);
    }
    public function geet()
    {
        $GtSdk = new \GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
        session_start();
        $data = array(
                "user_id" => Auth::id(), # 网站用户id
                "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
                "ip_address" => $this->getClientIP() # 请在此处传输用户请求验证时所携带的IP
            );
        $status = $GtSdk->pre_process($data, 1);
        $_SESSION['gtserver'] = $status;
        $_SESSION['user_id'] = $data['user_id'];
        echo $GtSdk->get_response_str();
    }
    protected function isGeet($request)
    {
        $GtSdk = new \GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
        $data = array(
        "user_id" => Auth::id(), # 网站用户id
        "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
        "ip_address" => $this->getClientIP() # 请在此处传输用户请求验证时所携带的IP
            );
        $geetest_challenge = $request->geetest_challenge;
        $geetest_validate = $request->geetest_validate;
        $geetest_seccode = $request->geetest_seccode;
        if($GtSdk->success_validate($geetest_challenge,$geetest_validate,$geetest_seccode,$data)==1)
            return true;
        else
            return false;
    }
    protected function getClientIP()  
    {  
        global $ip;  
        if (getenv("HTTP_CLIENT_IP"))  
            $ip = getenv("HTTP_CLIENT_IP");  
        else if(getenv("HTTP_X_FORWARDED_FOR"))  
            $ip = getenv("HTTP_X_FORWARDED_FOR");  
        else if(getenv("REMOTE_ADDR"))  
            $ip = getenv("REMOTE_ADDR");  
        else $ip = "Unknow";  
        return $ip;  
    }
}
