<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Session;
use App\Models\User;
use App\Models\Order;
use Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    /**
     * show login form for admin guard
     *
     * @return void
     */
    public function showLoginForm()
    {
        //dd(1);
        if (Auth::guest()) {
            return view('backend.auth.login');

       } else {
        return Redirect::to('/admin');
       }

    }


    public function userLoginForm($type, $name){

        Session::put('type',$type);
        Session::put('name',$name);
        return view('Front.userLoginForm');

    }

    public function userLoginToDashboard(){

        return view('Front.userLoginToDashboard');
    }

    public function cv_login_form()
    {
        return view('front.cv_login_form');
    }

      public function cv_login_main()
    {
        return view('front.cv_login_main');
    }

       public function job_search_page()
    {
        return view('front.job_search_page');
    }


    public function userDashboard(){


        $allPendingOffers = Order::where('user_id',Auth::user()->id)
        ->where('order_type','offer')->latest()->get();


        $allPendingServices = Order::where('user_id',Auth::user()->id)
        ->where('order_type','service')->latest()->get();

        return view('front.userDashboard',compact('allPendingOffers','allPendingServices'));
    }



    public function registrationToCheckout(Request $request){




        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        //dd($request->all());
        $customer =  new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone =$request->phone;

        if ($request->hasfile('nid_front')) {
            $file = $request->file('nid_front');
            $extension = $file->getClientOriginalExtension();
            $orinalName = $file->getClientOriginalName();
            $filename = $orinalName;
            $file->move('public/uploads/', $filename);
            $customer->nid_front = 'public/uploads/' . $filename;
        }

        if ($request->hasfile('nid_back')) {
            $file = $request->file('nid_back');
            $extension = $file->getClientOriginalExtension();
            $orinalName = $file->getClientOriginalName();
            $filename = $orinalName;
            $file->move('public/uploads/', $filename);
            $customer->nid_back = 'public/uploads/' . $filename;
        }


        $customer->password = Hash::make($request->password);
        $customer->save();

        $user = User::where('email',$request->get('email'))->first();

            \Auth::login($user);


        if(Session::get('type') == 'service'){
        return redirect()->route('confirm_service_order',Session::get('name'));
        }else{
            return redirect()->route('confirm_offer_order',Session::get('name'));

        }

    }


    /**
     * login admin
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        // Validate Login Data
        $request->validate([
            'email' => 'required|max:50',
            'password' => 'required',
        ]);

        // Attempt to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password,'status'=>1], $request->remember)) {
            // Redirect to dashboard
            Toastr::success('Successully login :)' ,'Success');
            return redirect()->intended(route('admin.dashboard'))->with('success','Successully login');
        } else {
            // Search using username
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password,'status'=>0], $request->remember)) {
                return back()->with('error','Access Denied,Call Administrator');
            }
            // error
            Toastr::error('Invalid email and password :)' ,'Success');

            return back();
        }
    }

    /**
     * logout admin guard
     *
     * @return void
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        Toastr::success('Successully logout :)' ,'Success');
        return redirect()->route('admin.login');
    }

    public function userLogout(){

        Session::flush();
        Auth::logout();

        return redirect('/');
    }


    public function loginToCheckout(Request $request){


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {


            if(Session::get('type') == 'service'){
        return redirect()->route('confirm_service_order',Session::get('name'));
        }else{
            return redirect()->route('confirm_offer_order',Session::get('name'));

        }
        }

        return redirect()->back()->withSuccess('Login details are not valid');


    }


    public function registrationUser(Request $request){


        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        //dd($request->all());
        $customer =  new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone =$request->phone;

        if ($request->hasfile('nid_front')) {
            $file = $request->file('nid_front');
            $extension = $file->getClientOriginalExtension();
            $orinalName = $file->getClientOriginalName();
            $filename = $orinalName;
            $file->move('public/uploads/', $filename);
            $customer->nid_front = 'public/uploads/' . $filename;
        }

        if ($request->hasfile('nid_back')) {
            $file = $request->file('nid_back');
            $extension = $file->getClientOriginalExtension();
            $orinalName = $file->getClientOriginalName();
            $filename = $orinalName;
            $file->move('public/uploads/', $filename);
            $customer->nid_back = 'public/uploads/' . $filename;
        }


        $customer->password = Hash::make($request->password);
        $customer->save();

        $user = User::where('email',$request->get('email'))->first();

            \Auth::login($user);


            return redirect()->route('userDashboard');

    }


    public function loginUser(Request $request){


        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {


            return redirect()->route('userDashboard');


        }

        return redirect()->back()->withSuccess('Login details are not valid');



    }
}
