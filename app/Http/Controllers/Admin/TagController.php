<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Carbon\Carbon;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(10);
       return  view('admin.tags.tags', ['tags'=> $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.tags.create');
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
      $data =  $this->validate($request,
            [
                'name' => 'required',
                'slug'  => 'required',
            ],[],[],

        );
        
        Tag::insert([
            'name'=> $request->name,
            'slug'=> $request->slug, 
            'created_at' => Carbon::now(),
        ]);
        return redirect(route('admin.tags'));
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
        $tag = Tag::where('id', $id)->first();
        return view('admin.tags.edit', compact('tag'));
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
      $data =  $this->validate($request,
            [
                'name' => 'required',
                'slug'  => 'required',
            ],[],[],

        );
        
        Tag::where('id', $id)->update([
            'name'=> $request->name,
            'slug'=> $request->slug, 
            'updated_at' => Carbon::now(),
        ]);
        return redirect(route('admin.tags'));
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
        Tag::where('id',$id)->delete();
        return redirect(route('admin.tags'));
    }
}
