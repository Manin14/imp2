<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    //

    public function index()
    {
        
      return view('user/login');
    
    }

    public function postlogin (Request $request){
        // dd($request->all()); 
        
        if (Auth::attempt($request->only('email','password'))){
            // dd($request->all()); 
            // return redirect('/beranda')->with(['success' => 'Berhasil Masuk']);
            return redirect('/task')->with(['success' => 'Berhasil Masuk']);
            
        }
        
        return redirect('login')->with(['success' => 'Email/Username dan Password Tidak Valid ....  ']);
      }

      public function logout (Request $request){
        Auth::logout();

        return redirect('/login');
      }


      public function home () {
        return view('user/home');
      }

      public function user () {
        return view('user/user');
      }

      public function save_user (Request $request) {
        $data =  new User;

        $name= $request->name;
        $level= $request->level;
        $email= $request->email;
        $password= $request->password;

        $data->name = $name;
        $data->email = $email;
        $data->level = $level;
        $data->password = bcrypt($password);
       

       


        $res = $data->save();

        if($res){ echo 'Success Save Data ...  '; }
        else{ echo 'Failed Save Data ...  '; }
    }


      

}
