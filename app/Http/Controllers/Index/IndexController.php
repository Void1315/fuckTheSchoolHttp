<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Result;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Auth;
use App\Http\TheSocket;

include_once dirname(dirname(__FILE__)) . '\TheSocket.php';

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
    	$model_obj = new Result();
    	if($request->isMethod('post'))
    	{
    		$this->returnData($request,$model_obj);
    		return ;
    	}
    	$results = $model_obj->getNewResults();#获取最新成绩
        if(!$results)
            new \TheSocket(Auth::user()->stu_num.','.Auth::user()->stu_passwd);
        $results = $model_obj->getNewResults();#获取最新成绩
    	$years = $model_obj->getAllYears();
    	$terms = $model_obj->getAllTerms();
        if($results)
            $results_json = json_decode($results->result,true);
        else
            $results_json = $results;
        if($results)
            $updated_at = $results->updated_at;
        else
            $updated_at = $results;
    	return view('index/index')->with('results',$results_json)
        ->with('time',$updated_at)->with('index','active')
        ->with('years',$years)->with('nav',$this->navSelect('index'))
        ->with('terms',$terms)->with('user',Auth::user());
    }
    protected function returnData($request,$model_obj)
    {
    	$data = $request->input('time');
    	$data_list = explode('-',$data);
    	$year = $data_list[0];
    	$term = $data_list[1];
    	$json = $model_obj->getResult($year,$term);
    	$the_data = json_encode(['0'=>$json->result,'1'=>$json->updated_at]);
    	echo $the_data;
    }
    public function about()
    {
        return view('index.about');
    }

    public function getResults(Request $request)
    {

    }
}
