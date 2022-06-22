<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Profile(){
        return view('admin.adminProfile');
    }
    public function updateProfile(Request $request)
    {
        //return $request;
        $id= $request->input('id');
        $user= User::find($id);
        //return $user;
        $user->name= $request->input('name');
        $user->email= $request->input('email');
        $user->address= $request->input('address');
        $user->gender= $request->input('gender');
        $user->phone= $request->input('phone');
        if($request->hasFile('photo')){
            $destination= $user->photo;

             if (File::exists($destination)) {

                   File::unlink($destination);

                 }

            $file = $request->file('photo');

            $name = $file->hashName();

            $url = Storage::disk('public')->putFileAs('', $file, $name);

            $user->photo = '/image/' . $name;
            
        }

        $user->update();
        return redirect()->back()->with('success', 'updated successfully');
    }
    public function password(Request $res){
       // return $res;
        $user= User::find($res->id);
        $user->password=Hash::make($res->confirm);
        $user->save();
        return redirect('Profile')->with('success', 'password updated successfully');
       // return $user;
    }
}
