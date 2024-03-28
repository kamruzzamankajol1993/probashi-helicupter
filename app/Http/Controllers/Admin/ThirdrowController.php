<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whyjoinus;
use Illuminate\Support\Str;
class ThirdrowController extends Controller
{
    public function index(){
//dd(12);
        $why_join_list = Whyjoinus::latest()->get();
        return view('backend.why_join_list.index',['why_join_list'=>$why_join_list]);
    }


    public function create()
    {

        return view('backend.why_join_list.create');
    }


    public function edit($id)
    {

        $user = Whyjoinus::where('id',$id)->latest()->first();
        return view('backend.why_join_list.edit',['user'=>$user]);
    }


    public function store(Request $request){

        $user = new Whyjoinus();
        $user->departure = $request->departure;
        $user->landing = $request->landing;

        $user->slug = Str::slug($request->departure.' '.$request->landing);


        $user->fly_date = $request->fly_date;
        $user->end_date = $request->end_date;
        $user->price = $request->price;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/', $filename);
            $user->image = 'public/uploads/' . $filename;
        }
        $user->save();
        return redirect()->route('admin.our_running_offer')->with('success','Created successfully!');

    }


    public function update(Request $request){

        $user = Whyjoinus::find($request->id);

        $user->departure = $request->departure;
        $user->landing = $request->landing;
        $user->fly_date = $request->fly_date;
        $user->end_date = $request->end_date;
        $user->slug = Str::slug($request->departure.' '.$request->landing);
        $user->price = $request->price;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/', $filename);
            $user->image = 'public/uploads/' . $filename;
        }
        $user->save();
        return redirect()->route('admin.our_running_offer')->with('success','Updated successfully!');

    }

    public function delete($id)
    {

        $admins = Whyjoinus::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        return back()->with('error','Deleted successfully!');
    }

}
