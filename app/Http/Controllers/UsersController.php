<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function register(Request $req){
        $user=New User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $userdata=$user->save();
        if($userdata){
            return redirect('login');
        }

    }
    public function login(Request $req){
        $user=User::where('email','=',$req->input('email'))->first();
        if(!$user || !Hash::check($req->input('password'),$user->password)){
            return "Email or Password does not match";
        }
        else{
            $req->session()->put('user',$user);
            if($user->type=='0'){
            return redirect('/');
            }
            else{
            return redirect('/adminlogin');
            }
        }
    }
    public function adminlogin(){
        $data=User::all();
        return view('admin.login',['data'=>$data]);
    }
    public function deleteuser($id){
        $deleteuser=User::find($id);
        $deleteuser->delete();
        return redirect()->back();
    }
}
