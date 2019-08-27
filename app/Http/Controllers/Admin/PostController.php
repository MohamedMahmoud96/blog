<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Category;
use App\Tag;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('category')->with('admin')->get();
       
       return  view('admin.posts.posts', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.posts.create', ['categories' => $categories, 'tags'=> $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->file('image');
       if($request){
      $data =  $this->validate($request,
            [
                'title' => 'required',
                'slug'  => 'required',
                'tag' => 'required',
                'category'  =>'required',
                'body'  => 'required',
                'image' => 'required|image',
            ],[],[],

        );
        $request->status == 1? $status = 1: $status =0;
        $request->slider == 1 ? $slider = 1 : $slider =0;
        if($request->hasFile('image'))
        {
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/posts'), $imgName); 

        }
        
        $post = new Post;
            $post->title=  $request->title;
            $post->slug= $request->slug;
            $post->body= $request->body;
            $post->status= $status;
            $post->slider = $slider;
            $post->image= 'uploads/posts/'.$imgName;
            $post->post_by= authAdmin()->user()->id;
            $post->category_id= $request->category;
            $post->created_at = Carbon::now();
        $post->save();
        $post->tag()->sync($request->tag);
       
        return redirect(route('admin.posts'));
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $post = Post::where('id', $id)->with(['category', 'tag'])->first();
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.posts.edit', compact(['post', 'categories', 'tags']));
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
                'title' => 'required',
                'slug'  => 'required',
                'tag' => 'required',
                'category'  =>'required',
                'body'  => 'required',
                'image' => 'required|image',
            ],[],[],

        );
        $request->status == 1? $status = 1: $status =0;
        $request->slider == 1 ? $slider = 1 : $slider =0;
        if($request->hasFile('image'))
        {
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/posts'), $imgName); 

        }
        
        $post = Post::find($id);
            $post->title=  $request->title;
            $post->slug= $request->slug;
            $post->body= $request->body;
            $post->status= $status;
            $post->slider = $slider;
            $post->image= 'uploads/posts/'.$imgName;
            $post->post_by= authAdmin()->user()->id;
            $post->category_id= $request->category;
            $post->tag()->sync($request->tag);
            $post->created_at = Carbon::now();

        $post->save();
        
        return redirect(route('admin.posts'));
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
        Post::where('id',$id)->delete();
        return redirect(route('admin.posts'));
    }
}
