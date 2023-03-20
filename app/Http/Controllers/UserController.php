<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    
    public function home(){
        return view('users.home');
    }

    public function create(){
        return view('users.register');
    }

    public function store(Request $request){

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique("users", "email")],
            'password' => ['required', 'confirmed', 'min:6']
        ]);
        //Hash Password

        $formFields['password'] = bcrypt($formFields['password']);
// create user
        $user = User::create($formFields);

        //login
        auth()->login($user);
        return redirect('/products')->with('message', 'User created and logged In');

    }

    public function logout(Request $request){
        //auth()->logout();
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        // $request->session()->regenerate();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/home');
    }

    //show login form

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
      if(auth()->attempt($formFields)){
        $request->session()->regenerate();

        return redirect('/products');
      }else{
        return back()->withErrors(['email' => 'invalid Credentials'])->onlyInput('email');
      }

       
    }
}
