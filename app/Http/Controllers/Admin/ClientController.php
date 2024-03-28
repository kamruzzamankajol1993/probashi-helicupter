<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class ClientController extends Controller
{
    public function index(){

        $user_list = User::latest()->get();
        return view('backend.user_list.index',['user_list'=>$user_list]);
    }


    public function destroy($id)
    {

        $admins = User::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
