<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','stu_num','stu_passwd','query',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasManyResult()
    {
        return $this->hasMany('App\Result','u_id','stu_num');
    }

    public function register($request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        User::create(Input::all())->update(['password' => Hash::make($request->input('password'))]);
        Auth::attempt(['email' => $email, 'password' => $password]);
    }
    public function inUser($request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if(Auth::attempt(['email' => $email,'password' => $password],$remember))
        {
            return redirect('/');
        }
        else
        {
            return Redirect::back()->withInput()->withErrors('邮箱或密码错误');
        }
    }
    public function updateUser($request)
    {
        User::where('id',Auth::id())->update($request->except('_token'));
        return true;
    }
    public function getPasswd()
    {
        return User::where('id',Auth::id())->first()->password;
    }
    public function getStuPasswd()
    {
        return User::where('id',Auth::id())->first()->stu_passwd;
    }
    public function isRegister($request)
    {
        $email = $request->input('email');
        if($this->where('email',$email)->first())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
