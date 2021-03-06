<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\bidInfo;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function store(Request $request)
    {
    //     $validate= $request->validate ([
    //         'title'=>'required',
    //         'category'=>'required',
    //         'quantity'=>'required',
    //         'rate'=>'required',
    //         'unit'=>'',
    //         'description'=>'required',

    //    ]);
    //    product::insert($validate);

    //return $request->all();
     $product = new product();
     $product->title = $request->title;
     $product->category = $request->category;
     $product->quantity = $request->quantity;
     $product->base_price = $request->base_price;
     $product->unit = $request->unit;
     $product->description = $request->description;
     $product->Uid=Auth::User()->id;
     $product->save();
     return redirect(route('dashboard'));

     //echo "Inserted successfully";
    //return $request->all();
    }
    public function update(Request $request)
    {
       // return $request->all();
        $eproduct=product::find($request->eid);
        $eproduct->title = $request->etitle;
        $eproduct->category = $request->ecategory;
        $eproduct->quantity = $request->equantity;
        $eproduct->base_price = $request->erate;
        $eproduct->unit = $request->eunit;
        $eproduct->description = $request->edescription;

        $eproduct->save();

        return redirect(route('dashboard'));
    }

    public function placeToBid(Request $request){
        $bid=new bidInfo();
        $bid->startingAmount = $request->startingBid;
        $bid->timePeriod=$request->bidTime;
        $bid->pid=$request->pid;
        $bid->fid=Auth::user()->id;
        $bid->submitTime=Carbon::now();

        $bid->save();

        return redirect(route('dashboard'));
    }

    public function destroy($id)
    {
        product::destroy($id);
        return redirect(route('dashboard'));
    }
}
