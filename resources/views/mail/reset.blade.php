@extends('mail.layout.layout')
@section('reset')
<br>
	你重置密码的地址为
	<strong>
		<a href="{{url('/reset')}}?email={{session('token_email')}}&code={{encrypt(session('code'))}}">
			{{url('/reset')}}?email={{session('token_email')}}&amp;code={{encrypt(session('code'))}}
		</a>
	</strong>。请在四十分钟内确认。
@endsection