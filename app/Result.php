<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Result extends Model
{
    //
    protected $fillable = [
        'u_id', 'result', 'year','term'
    ];
    
    public function getAllResult()
    {
    	return User::where('id',Auth::id())->first()->hasManyResult;
    }
    public function getAllYears()
    {
        $u_id = User::where('id',Auth::id())->first()->stu_num;
        return array_unique(Result::where('u_id',$u_id)->get(['year'])->pluck('year')->all());
    }
    public function getAllTerms()
    {
        $u_id = User::where('id',Auth::id())->first()->stu_num;
        return Result::where('u_id',$u_id)->get(['term'])->pluck('term')->all();
    }
    public function getTest()
    {
    	return User::where('id',Auth::id())->first()->hasManyResult()->first();
    }
    public function getResult($year,$term)
    {
        $u_id = User::where('id',Auth::id())->first()->stu_num;
        return Result::where('u_id',$u_id)->where('year',$year)->where('term',$term)->first();
    }
}
