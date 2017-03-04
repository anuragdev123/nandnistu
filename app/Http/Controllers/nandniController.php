<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clickedbookingphoto;
use Illuminate\Support\Facades\Input;

class nandniController extends Controller
{


    public function index()
    {
        return view('insert');
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

         $user->save();

         echo "scucd";

    }
        // $user->save();
      // return redirect("showall");
       /// echo "scucd";


    public function showall()
    {
        $user=clickedbookingphoto::all();
        return view("viewall",compact('user'));
    }


}
