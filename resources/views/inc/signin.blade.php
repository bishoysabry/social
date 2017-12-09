@extends('layouts.master')

@section('title')
Login
@endsection



@section('content')
<div class="   col-md-4 col-md-offset-4 container loginpage">
 <h1 class="text-center">
	 <span class=" active" data-class="login">Log in </span>|<span data-class="signup"> Sign up</span>
	 </h1>
	 <!-- login form -->
	 <form class="login  " action="{{route('signin')}}" method ="POST">
  {{ csrf_field() }}
     <input  class="form-control input-lg" type="text"  name="email" placeholder="Email"   value="{{Request::old('email')}}" />


     <input class="form-control input-lg" type="password"  name="password" placeholder="password" autocomplete="new-password" value="{{Request::old('password')}}"/>
     <input class="btn btn-primary btn-lg  btn-block" name="login" type="submit" value="login"/>
     @if(count($errors)>0)
     <div class="alert">
       <ul>
     @foreach($errors->all() as $error)
     <li>
     {{$error}}
     </li>
     @endforeach
     </div>
     @endif
	</form>
  <!-- signup form -->
	<form  style="display:none;" class="signup" action="{{route('signup')}}" method ="POST">
      {{ csrf_field() }}
      	 <input  class="form-control input-lg" type="email"  name="email" placeholder="User E-mail"  value="{{Request::old('email')}}" />

     <input  class="form-control input-lg" type="text"  name="username" placeholder="User Name" autocomplete="off" value="{{Request::old('username')}}" />
     <input class="form-control input-lg" type="password"  name="password" placeholder="password" autocomplete="new-password"value="{{Request::old('password')}}" />


     <input class="btn btn-success btn-lg  btn-block" name="signup" type="submit" value="Sign up"/>
	</form>
</div>
@endsection
<div class="clearfix"></div>
