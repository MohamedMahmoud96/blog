<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Slider;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
    	$slider = Slider::orderBy('id','DESC')->paginate(5);
        return view('admin.blog.blog', ['sliders'=>$slider]);
    	
    }
    public function addSlider( Request $request)
    {

    if($request->hasFile('image'))
        {
         $this->validate($request,['image'=>'required|image'],[],[]);
          $img = $request->file('image');
          $imgName = Str::random(50).'.'. $img->extension();
          $url = $img->move(public_path('uploads/slider'), $imgName); 
         Slider::create([
         	"image"=>'uploads/slider/'.$imgName 
         ]);
         	return back();
        }

    }
   public function deleteSlider($id)
   {
   	Slider::find($id)->delete();
   	return back();
   }
}
