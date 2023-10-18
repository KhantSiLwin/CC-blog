<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view("auth.register");
    }

    public function store(){
    //    dd(request()->all());
       $cleanData= request()->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required',Rule::unique('users','email')],
            'password' => ['required','min:6','max:12','confirmed'],
        ]);

        
        // $cleanData['password'] = bcrypt($cleanData['password']);
       $user = User::create($cleanData);
       auth()->login($user);
        return redirect('/')->with('success','Welcometo  to our blog '.$user->name);

    }


    public function login(){
        return view("auth.login");
    }

    public function loginStore(){
      
        $cleanData= request()->validate([
           
            'email' => ['required',Rule::exists('users','email')],
            'password' => ['required','min:6',],
        ],[
            'email.exits' =>"User does not exits"
        ]); 

        if(auth()->attempt($cleanData)){
            return redirect('/')->with('success','Welcometo  back '.auth()->user()->name);
        }else{
            return back()->withErrors([
                'email'=> 'Your Credentials is something wrong'
            ]);
        }   
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
    
}
