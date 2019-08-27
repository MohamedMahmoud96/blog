<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
class PostsController extends Controller
{
    public function show($id)
    {
    	$post = Post::where('id', $id)->with(['admin', 'category','tag'])->first();
    	$posts = Post::orderBy('id','desc')->with(['admin', 'category'])->get();
    	return view('blog/single-post', ['post'=>$post, 'posts'=> $posts,]);
    }

    public function search(request $request)
    {
    	if($request->ajax())
    	{	
    	$posts = Post::where([
    		['body', 'like', '%'.$request->val. '%'],
    		['title', 'like', '%'.$request->val. '%']
    	])->with('admin')->get();
    	$noFound = null;
 		
    	if(count($posts) == 0){
    		$noFound = 'Not result to search [' .$request->val . ']';
    	}
    	return view('blog/search', ['posts'=>$posts, 'noFound'=>$noFound]);
    	}
    
    }
}
