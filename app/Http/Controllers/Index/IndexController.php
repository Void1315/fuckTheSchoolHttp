<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Result;

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
    	$results = $model_obj->getTest();
    	$years = $model_obj->getAllYears();
    	$terms = $model_obj->getAllTerms();
    	return view('index/index')->with('results',json_decode($results->result,true))->with('time',$results->updated_at)->with('years',$years)->with('terms',$terms);
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
}
