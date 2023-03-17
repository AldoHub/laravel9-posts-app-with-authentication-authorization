<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //

    
    public function create(){
        return view('users.create');
    }


    public function store(Request $req){
        //ddd($req->all());

        //validation
        $formFields = $req->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:5'],            
        ]);
    
        //hash the password
        $formFields['password'] = bcrypt($formFields['password']);
    
        //create the user
        $user = User::create($formFields);

        //login the new user
        auth()->login($user);

        return redirect('/')->with('message', 'New user created, you are now logged in!');

    }


    public function login(){
        return view("users.login");
    }

    public function logout(Request $req){
        auth()->logout();
        $req->session()->invalidate();


        $req->session()->regenerateToken();
        return redirect("/")->with("message", "You have been logged out");
    }


    public function authenticate(Request $req){
          //validation
          $formFields = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],            
        ]);

        if(auth()->attempt(($formFields))){
            $req->session()->regenerate();
            return redirect("/")->with("message", "You have been logged in");
        }else{
            return back()->withErrors(["email" => "Invalid Credentials"])->onlyInput("email");
        }


    }


}
