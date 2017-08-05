<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public function getAllMessage()//获得所有评论
    {
    	return $this->all()->sortBy('updated_at');
    }
}
