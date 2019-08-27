<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::get();
      
       return  view('admin.admin.admins', ['admins'=> $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request){
           $this->validate($request,
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:admins',
                    'password' => 'required|confirmed|min:6',
                    'password_confirmation' =>'required',
                    'image' => 'required|image',
                ],[],[],

            );
            if($request->hasFile('image'))
            {
              $img = $request->file('image');
              $imgName = Str::random(50).'.'. $img->extension();
              $url = $img->move(public_path('uploads/admins'), $imgName); 

            }
            
            $admin = new Admin;
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password) ;
                $admin->image= 'uploads/admins/'.$imgName;
                $admin->created_at = Carbon::now();
            $admin->save();
           
           
            return redirect(route('admin'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $admin = Admin::find($id);
        return view('admin.admin.edit', ['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if($request){
           $this->validate($request,
                [
                   
                    'email' => 'email',
                    'email' => Rule::unique('admins')->ignore($id),
                    'password' => 'confirmed',
                    'image' => 'image',
                ],[],[],

            );
           
            
          $admin = Admin::find($id);
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password);       
                $admin->updated_at = Carbon::now();   
            if($request->hasFile('image'))
            {
              $img = $request->file('image');
              $imgName = Str::random(50).'.'. $img->extension();
              $url = $img->move(public_path('uploads/admins'), $imgName); 
                $admin->image = 'uploads/admins/'.$imgName;
            }   
              $admin->update();
            return back();
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return back();
    }
}
