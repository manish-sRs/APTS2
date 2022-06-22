<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Product;




class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('admin')){
            return view('admin');
        }elseif(Auth::user()->hasRole('farmer')){
            $result= Product::all();
            return view('farmer',compact('result'));
        }elseif(Auth::user()->hasRole('vendor')){
            return view('vendor');

        }
    }

    public function adminFarmer()
    {
        return view('admin.adminFarmer');
    }
}
