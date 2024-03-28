<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Whyjoinus;
use App\Models\Mission;
use App\Models\Order;
class DashboardController extends Controller
{
	public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index(){
if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }
 $totalOrderCount = Order::count();
 $totalOrderCountP = Order::whereNull('confirm_status')->count();
 $allOffersCount = Whyjoinus::count();
 $allServiceCount=Mission::count();
 $allPendingOffers = Order::whereNull('confirm_status')->where('order_type','offer')->latest()->limit(5)->get();

    	return view('backend.index',compact('allPendingOffers','totalOrderCount','totalOrderCountP','allOffersCount','allServiceCount'));
    }
}
