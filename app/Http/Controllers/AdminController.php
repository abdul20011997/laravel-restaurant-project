<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foodmenu;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Order;



use File;
class AdminController extends Controller
{
    //
    public function index(Request $req){
        $foodmenu=New Foodmenu;
        $foodmenu->title=$req->title;
        $foodmenu->price=$req->price;
        $foodmenu->description=$req->description;
        $destination='public/foodmenu';
        $name=time().'.'.$req->file('image')->extension();
        $req->file('image')->storeAs($destination,$name);
        $foodmenu->image=$name;
        $foodmenu->save();
        return redirect()->back();

    }
    public function getfoodmenu(){
        $data=Foodmenu::all();
        return view('admin.addfoodmenu',['data'=>$data]);
        
    }
    public function deletefoodmenu($id){
        $data=Foodmenu::find($id);
        $image_path = 'storage/foodmenu/'.$data->image;  
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $data->delete();
        return redirect()->back();
    }

    public function editfoodmenu($id){
        $data=Foodmenu::find($id);
        return view('admin.editfoodmenu',['data'=>$data]);
    }
    public function updatefoodmenu(Request $req){
        $data=Foodmenu::find($req->id);
        $data->title=$req->title;
        $data->price=$req->price;
        $data->description=$req->description;
        $destination='public/foodmenu';
        $imagepath='storage/foodmenu/'.$data->image;
        if(File::exists($imagepath)){
            File::delete($imagepath);
        }
        $name=time().'.'.$req->file('image')->extension();
        $req->file('image')->storeAs($destination,$name);
        $data->image=$name;
        $data->save();
        return redirect('/addfoodmenu');

    }
    public function getreservation(){
        $data=Reservation::all();
        return view('admin.reservation',['data'=>$data]);
    }
    public function chef(){
        $data=Chef::all();
        return view('admin.chef',['data'=>$data]);
    }
    public function editchef($id){
        $data=Chef::find($id);
        return view('admin.editchef',['data'=>$data]);
    }
    public function addchef(Request $req){
        $data=New Chef;
        $data->name=$req->name;
        $data->speciality=$req->speciality;
        $destination='public/chef';
        $name=time().'.'.$req->file('image')->extension();
        $req->file('image')->storeAs($destination,$name);
        $data->image=$name;
        $data->save();
        return redirect()->back();
    }

    public function updatechef(Request $req){
        $data=Chef::find($req->id);
        $data->name=$req->name;
        $data->speciality=$req->speciality;
        $destination='public/chef';
        $destinationpath='storage/chef/'.$data->image;
        if(File::exists($destinationpath)){
            File::delete($destinationpath);
        }
        $name=time().'.'.$req->file('image')->extension();
        $req->file('image')->storeAs($destination,$name);
        $data->image=$name;
        $data->save();
        return redirect('/chef');

    }
    public function deletechef($id){
        $data=Chef::find($id);
        $destinationpath='storage/chef/'.$data->image;
        if(File::exists($destinationpath)){
            File::delete($destinationpath);
        }
        $data->delete();
        return redirect()->back();
    }
    public function getorders(){
        $data=Order::all();
        return view('admin.orders',['data'=>$data]);
    }
    public function search(Request $req){
        $data=Order::where('name','Like','%'.$req->search.'%')->orWhere('address','Like','%'.$req->search.'%')->get();
        return view('admin.orders',['data'=>$data]);

    }
    
}
