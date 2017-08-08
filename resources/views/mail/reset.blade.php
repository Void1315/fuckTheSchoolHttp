@extends('mail.layout.layout')
@section('reset')
	你重置密码的验证码为
	<strong>{{$code}}</strong>。请在四十分钟内输入。
@endsection