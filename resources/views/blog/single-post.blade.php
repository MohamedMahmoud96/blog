  @extends('index')
@section('title')
 Single-Post
@endsection
 @section('slider')
     <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-600 bg-img background-overlay" style="background-image: url({{url($post->image)}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <!-- Catagory -->
                        <div class="post-cta"><a href="{{route('category')}}">{{$post->category->name}}</a></div>
                        <h3>{{$post->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->
 @endsection
  @section('content')
  <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="col-12 col-lg-8">
                    <div class="single-blog-content mb-100">
                        <!-- Post Meta -->
                        <div class="post-meta">
                            <p><a href="#" class="post-author">{{$post->admin->name}}</a> on <a href="#" class="post-date">{{$post->created_at}}</a></p>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">

                         {!!$post->body !!}
                            <!-- Post Tags -->
                            <ul class="post-tags">
                           @foreach($post->tag as $tag)
                                <li><a href="#">{{$tag->name}}</a></li>
                            @endforeach
                            </ul>
                            <!-- Post Meta -->
                            <div class="post-meta second-part">
                                <p><a href="#" class="post-author">{{$post->admin->name}}</a> on <a href="#" class="post-date">{{$post->created_at}}</a></p>
                            </div>
                        </div>
                    </div>
              </div>
                @include('layouts.sidebar')

        
</div>
         <div class="row justify-content-center">
            @foreach($posts as $i => $post)
                <!-- ========== Single Blog Post ========== -->
                <div class="col-12 col-md-6 col-lg-4">
                
                    <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.45s">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="{{url($post->image)}}" alt="">
                            <!-- Post Content -->
                            <div class="post-content d-flex align-items-center justify-content-between">
                                <!-- Catagory -->
                                <div class="post-tag"><a href="{{route('category')}}">{{$post->category->name}}</a></div>
                                <!-- Headline -->
                                <a href="{{route('single-post',['id'=>$post->id])}}" class="headline">
                                    <h5>{{$post->title}}</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-author">{{$post->admin->name}}</a> on <a href="#" class="post-date">{{$post->created_at}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                 @if($i >= 2) @break @endif
            @endforeach
            </div>

         
       
  @endsection          