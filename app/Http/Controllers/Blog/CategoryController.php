<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('id', 'asc')->with('posts')->paginate(6);
    	$posts = Post::orderBy('id', 'desc')->with(['category', 'admin'])->paginate(10);
    	return view('blog.category', compact(['categories', 'posts']));
    }
}
