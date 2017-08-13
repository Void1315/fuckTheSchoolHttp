<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	//
	protected $fillable = ['u_id','title','content','agree','contra'];
	public function getAllMessage()//获得所有评论
	{
		return $this->all()->sortByDesc('updated_at');
	}
	public function addMessage(array $message)
	{
		$this->create($message);
	}
}
