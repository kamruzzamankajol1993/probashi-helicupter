<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{


    public function pending_offer_order_list(){


        $allPendingOffers = Order::whereNull('confirm_status')->where('order_type','offer')->latest()->get();

        return view('backend.order.pending_offer_order_list',compact('allPendingOffers'));
    }


    public function pending_service_order_list(){

        $allPendingOffers = Order::whereNull('confirm_status')->where('order_type','service')->latest()->get();

        return view('backend.order.pending_service_order_list',compact('allPendingOffers'));

    }

    public function offer_order_list(){
        $allPendingOffers = Order::where('order_type','offer')->latest()->get();

        return view('backend.order.offer_order_list',compact('allPendingOffers'));

    }

    public function service_order_list(){
        $allPendingOffers = Order::where('order_type','service')->latest()->get();

        return view('backend.order.service_order_list',compact('allPendingOffers'));

    }


    public function update_order_status(Request $request){

        $allPendingOffers = Order::find($id);
        $allPendingOffers->confirm_status = $request->confirm_status;
        $allPendingOffers->status = $request->status;
        $allPendingOffers->save();
        return redirect()->back()->with('success','Updated SuccessFully');
    }

}
