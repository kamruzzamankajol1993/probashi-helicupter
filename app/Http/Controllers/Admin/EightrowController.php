<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UrgentVacancy;
class EightrowController extends Controller
{
    public function index(){

        $eight_row_list = UrgentVacancy::latest()->get();
        return view('backend.eight_row_list.index',['eight_row_list'=>$eight_row_list]);
    }


    public function create()
    {

        return view('backend.eight_row_list.create');
    }


    public function edit($id)
    {

        $user = UrgentVacancy::where('id',$id)->latest()->first();
        return view('backend.eight_row_list.edit',['user'=>$user]);
    }


    public function store(Request $request){

        $user = new UrgentVacancy();
        $user->status = $request->status;
        $user->title = $request->title;
        $user->des = $request->des;
        $user->image = $request->image;
        $user->save();
        return redirect()->route('admin.client_say_part')->with('success','Created successfully!');

    }


    public function update(Request $request){

        $user = UrgentVacancy::find($request->id);
        $user->status = $request->status;
        $user->title = $request->title;
        $user->des = $request->des;
        $user->image = $request->image;
        $user->save();
        return redirect()->route('admin.client_say_part')->with('success','Created successfully!');

    }

    public function delete($id)
    {

        $admins = UrgentVacancy::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
