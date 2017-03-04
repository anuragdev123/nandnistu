<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clickednoramalphoto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
//require ('vendor/autoload.php');
// use Intervention\Image\ImageManagerStatic as Image;


class normalController extends Controller
{


    public function indexNormal()
    {
        return view('normalInsert');
    }


    public function storeNormal(Request $request)
    {
        $user= new clickednoramalphoto;
        $user->date= Input::get('date');
        $user->name= Input::get('name');
        $user->mobile_num= Input::get('mobile_num');
        $user->size= Input::get('size');
        $user->other_size= Input::get('other_size');
        $user->total_photos= Input::get('total_photos');
        $user->total_prize= Input::get('total_prize');
        // $user->total_rate= Input::get('total_rate');
        $user->advance= Input::get('advance');
        $user->due= Input::get('due');
        $user->chnages= Input::get('chnages');
        
        if(Input::hasFile("image")){
            $file=Input::file('image');
            $name=time()."_".$file->getClientOriginalName();
            $image=$file->move(public_path().'/',$name);

           // Image::make($file->getRealPath())->resize(10, 10)->save($image);

            $user->image=$name;

        }
        $user->save();
      // return redirect("showall");
        echo "data inserted";


   }
}
