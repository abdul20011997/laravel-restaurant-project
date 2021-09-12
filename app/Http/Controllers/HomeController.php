<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foodmenu;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;
use Session;



class HomeController extends Controller
{
    //
    public function index(){
        if(Session::has('user')){
            if(Session::get('user')['type']==1){
                return redirect('/adminlogin');
            }
            else{
                $data=Foodmenu::all();
                $chef=Chef::all();
                return view('home',['data'=>$data,'chef'=>$chef]);
            }
        }
        else{
            $data=Foodmenu::all();
            $chef=Chef::all();
            return view('home',['data'=>$data,'chef'=>$chef]);
        }

        
    }
    static public function count(){
        $userid=Session::get('user')['id'];
        $count=Cart::where('user_id','=',$userid)->count();
        return $count;
    }
    public function storereservation(Request $req){
        $data=New Reservation;
        $data->name=$req->name;
        $data->email=$req->email;
        $data->phoneno=$req->phoneno;
        $data->guest=$req->input('guest');
        $data->date=$req->date;
        $data->time=$req->time;
        $data->message=$req->message;
        $data->save();
        return redirect()->back();
    }
    public function addtocart(Request $req){
       if($req->session()->has('user')){
            $cart=New Cart;
            $userid=$req->session()->get('user')['id'];
            $count=cart::where('user_id','=',$userid,'AND')->where('product_id','=',$req->productid)->count();
            if($count > 0){
                $cart=Cart::where('user_id','=',$userid,'AND')->where('product_id','=',$req->productid)->get();
                $newquantity=$cart[0]['quantity'] + $req->input('quantity');
                $cartdata=Cart::where('user_id','=',$userid,'AND')->where('product_id','=',$req->productid)->update([
                    'quantity'=>$newquantity
                ]);
            }
            else{
                $cart->user_id=$req->session()->get('user')['id'];
                $cart->product_id=$req->productid;
                $cart->quantity=$req->input('quantity');
                $cart->save();
            }
            return redirect()->back();
       }
       else{
           return redirect('/login');
       }
    }
    public function cart(){
        if(Session::has('user')){
        $userid=Session::get('user')['id'];
        $data=Cart::where('user_id','=',$userid)->join('foodmenus','cart.product_id','=','foodmenus.id')->select('foodmenus.*','cart.quantity AS Qty','cart.id AS ID')->get();
        $amount=0;
        for($i=0;$i<count($data);$i++){
            $singleprice=$data[$i]['Qty'] * $data[$i]['price'];
            $amount=$amount+$singleprice;
        }
        return view('cart',['data'=>$data,'totalamount'=>$amount]);
        }
        else{
            return view('cart',['data'=>[]]); 
        }
        
    }
    public function removecart($id){
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function order(Request $req){
        $userid=Session::get('user')['id'];
        $cart=cart::where('user_id','=',$userid)->join('foodmenus','cart.product_id','=','foodmenus.id')->get();
        for($i=0;$i<count($cart);$i++){
            $order=New Order;
            $order->product_id=$cart[$i]->product_id;
            $order->price=$cart[$i]->price;
            $order->quantity=$cart[$i]->quantity;
            $order->name=$req->name;
            $order->phoneno=$req->phoneno;
            $order->address=$req->address;
            $order->save();

        }
        // $cart=Cart::where('user_id','=',$userid)->get();
        // $cart->delete();
        return redirect()->back();
    }
}


