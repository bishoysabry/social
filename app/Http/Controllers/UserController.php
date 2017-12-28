<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller {



  public function SignUp(Request $request )
  {
    $this->validate($request,[
        'email'=>'required|email|unique:users',
        'username'=>'required|max:120',
        'password'=>'required|min:4',
      ]);
    $email=$request['email'];
    $username=$request['username'];
    $password=bcrypt($request['password']);
    $user= new User();
    $user->email=$email;
    $user->username=$username;
    $user->password=$password;
    $user->save();
    Auth::login($user);
    return redirect()->route('dashboard');


  }
  public function SignIn(Request $request)
  {

    $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required',

      ]);
    if (Auth::attempt(
      [
        'email'=>$request['email'],
        'password'=>$request['password']
      ]
      ))
    {
      return redirect()->route('dashboard');
    }
return redirect()->back();
  }
public function logOut()
{
  Auth::logout();
  return redirect()->route('home');
}
public function getAccount()
{
  return view('account',['user'=>Auth::user()]);
}
public function updateAccount(Request $request)
{
  $this->validate($request,[
      'username'=>'required|max:120',
      'image'=>'required',
    ]);
    $user = Auth::user();
    $user->username=$request['username'];
    $user->update();
    $file=$request->file('image');
    $filename=$request['username'] .'-'.$user->id.'.jpg';
    if ($file) {
      Storage::disk('local')->put($filename,File::get($file));

    }
  return redirect()->route('account');
}
public function getImage($filename)
{
  $file=Storage::disk('local')->get($filename);
  return new Response($file,200);
}
}
