<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Product;
use App\Models\bidInfo;




class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('admin')){
            return view('admin');
        }elseif(Auth::user()->hasRole('farmer')){
            $id=Auth::user()->id;
            $result= Product::where('Uid',$id)->get();
            return view('farmer',compact('result'));
        }elseif(Auth::user()->hasRole('vendor')){
            $result=bidInfo::join('product','bid_info.pid','=','product.Pid')->join('users','bid_info.fid','=','users.id')->select('product.*','bid_info.*')->get();
            //return view('vendor');
            return view('vendor',compact('result'));

        }
    }

    public function adminFarmer()
    {
        return view('admin.adminFarmer');
    }
}
