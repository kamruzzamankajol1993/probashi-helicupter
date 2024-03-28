<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mission;
use Illuminate\Support\Str;
class ServiceController extends Controller
{
    public function index(){

        $mission_list = Mission::latest()->get();
        return view('backend.mission_list.index',['mission_list'=>$mission_list]);
    }


    public function create()
    {

        return view('backend.mission_list.create');
    }


    public function edit($id)
    {

        $user = Mission::where('id',$id)->latest()->first();
        return view('backend.mission_list.edit',['user'=>$user]);
    }


    public function store(Request $request){

        $user = new Mission();

        $user->title = $request->title;
        $user->des = $request->des;
        $user->price = $request->price;

        $user->slug = Str::slug($request->title);


        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/', $filename);
            $user->image = 'public/uploads/' . $filename;
        }
        $user->save();
        return redirect()->route('serviceList.index')->with('success','Created successfully!');

    }


    public function update(Request $request){

        $user = Mission::find($request->id);
        $user->price = $request->price;
        $user->title = $request->title;

        $user->slug = Str::slug($request->title);

        $user->des = $request->des;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/', $filename);
            $user->image = 'public/uploads/' . $filename;
        }
        $user->save();
        return redirect()->route('serviceList.index')->with('info','Updated successfully!');

    }

    public function destroy($id)
    {

        $admins = Mission::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }
}
