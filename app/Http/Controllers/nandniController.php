<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clickedbookingphoto;
use Illuminate\Support\Facades\Input;

class nandniController extends Controller
{


    public function index()
    {
        return view('index');
    }
    

    public function store(Request $request)
    {
        $user= new clickedbookingphoto;
        $user->name= Input::get('name');
        $user->phone_num= Input::get('phone_num');
        $user->booking_date= Input::get('booking_date');
        $user->function_date= Input::get('function_date');
        $user->occation= Input::get('occation');
        $user->size= Input::get('size');
        $user->total_rate= Input::get('total_rate');
        $user->advance= Input::get('advance');
        $user->due= Input::get('due');


        
        if(Input::hasFile("image")){
            $file=Input::file('image');
            $name=time()."_".$file->getClientOriginalName();
            $image=$file->move(public_path().'/',$name);
            $user->image=$name;

        }
      


           $user->save();
     return redirect("showall");
        //echo "scucd";

    }
       


    public function showall()
    {
        $user=clickedbookingphoto::all();
        return view("viewall",compact('user'));
    }


}
