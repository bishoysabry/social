@extends('layouts.master')

@section('title')
Signup
@endsection



@section('content')
<div class="   col-md-4 col-md-offset-4 container loginpage">
 <h1 class="text-center">
	 <span  data-class="login">Log in </span>|<span class=" active" data-class="signup"> Sign up</span>
	 </h1>
	 <!-- login form -->
	 <form style="display:none;" class="login  " action="{{route('signin')}}" method ="POST">
  {{ csrf_field() }}
     <input  class="form-control input-lg" type="text"  name="email" placeholder="Email" autocomplete="off"  value="{{Request::old('email')}}"/>


     <input class="form-control input-lg" type="password"  name="password" placeholder="password" autocomplete="new-password" />
     <input class="btn btn-primary btn-lg  btn-block" name="login" type="submit" value="login"/>
	</form>
  <!-- signup form -->
	<form class="signup" action="{{route('signup')}}" method ="POST">
      {{ csrf_field() }}
      	 <input  class="form-control input-lg" type="email"  name="email" placeholder="User E-mail" value="{{Request::old('email')}}"  />

     <input  class="form-control input-lg" type="text"  name="username" placeholder="User Name" value="{{Request::old('username')}}" />
     <input class="form-control input-lg" type="password"  name="password" placeholder="password" autocomplete="new-password" value="{{Request::old('password')}}" />
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

     <input class="btn btn-success btn-lg  btn-block" name="signup" type="submit" value="Sign up"/>
	</form>

</div>
@endsection
<div class="clearfix"></div>
