<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Slider;
class HomeController extends Controller
{
    public function index()
   {
   
   	 $posts = Post::orderBy('id','desc')->with('category')->with('admin')->get();
   	$categories = Category::orderBy('id', 'desc')->with('posts')->get();
   	 $sliderPosts = Post::where('slider', 1)->paginate(4);
   	$sliders = Slider::orderBy('id','DESC')->get();
   	return view('home', ['categories'=> $categories, 'posts'=>$posts, 'sliderPosts' => $sliderPosts, 'sliders' => $sliders]);
   }
}
