  @extends('index')
  @section('title')
  Home
  @endsection
 @section('slider')
 @include('layouts.slider')
 @endsection 
  @section('content')
 
  <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="col-12 col-lg-8">
                    <div class="post-content-area mb-50">
                        <!-- Catagory Area -->
                        <div class="world-catagory-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="title">Categories</li>
                                 <li class="nav-item">
                                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#world-tab-1" role="tab" aria-controls="world-tab-1" aria-selected="true">All</a>
                                </li>
                            @foreach($categories as $i => $category)
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-{{$category->name}}" data-toggle="tab" href="#{{$category->name}}" role="tab" aria-controls="{{$category->name}}" aria-selected="true">{{$category->name}}</a>
                                </li>
                             @if($i >= 4) @break @endif
                            @endforeach
                            </ul>

                           <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="world-catagory-slider owl-carousel wow fadeInUpBig" data-wow-delay="0.1s">

                                        @foreach($posts as $i => $post)

                                                    <!-- Single Blog Post -->
                                                <div class="single-blog-post">
                                                    <!-- Post Thumbnail -->
                                                    <div class="post-thumbnail">
                                                        <img src="{{url($post->image)}}" alt="">
                                                        <!-- Catagory -->
                                                        <div class="post-cta"><a href="#">{{$post->category->name}}</a></div>
                                                    </div>
                                                    <!-- Post Content -->
                                                    <div class="post-content">
                                                        <a href="{{route('single-post',['id'=>$post->id])}}" class="headline">
                                                            <h5>{{$post->title}}</h5>
                                                        </a>
                                                       
                                                        <!-- Post Meta -->
                                                        <div class="post-meta">
                                                            <p><a href="#" class="post-author">{{$post->admin->name}}</a> on <a href="#" class="post-date">{{$post->created_at}}</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                             @if($i >= 2) @break @endif
                                        @endforeach
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                       @foreach($posts as $i=> $post)
                                             @if($i >= 3)   
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="{{$post->image}}" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="{{route('single-post',['id'=>$post->id])}}" class="headline">
                                                        <h5>{{$post->title}}</h5>
                                                    </a>
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                        <p><a href="#" class="post-author">{{$post->admin->name}}</a> on <a href="#" class="post-date">{{$post->created_at}}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if($i >= 6) @break @endif
                                         @endforeach
                                        </div>
                                    </div>
                                </div>
                                 @foreach($categories as $category)

                                   <div class="tab-pane fade" id="{{$category->name}}" role="tabpanel" aria-labelledby="tab-{{$category->name}}">
                                    <div class="row">
                                       <div class="col-12 col-md-6">
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="{{$category->posts[0]->image}}" alt="">
                                                    <!-- Catagory -->
                                                    <div class="post-cta"><a href="#">{{$category->name}}</a></div>
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="{{route('single-post',['id'=>$post->id])}}" class="headline">
                                                        <h5>{{$category->posts[0]->title}}</h5>
                                                    </a>
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                        <p><a href="#" class="post-author">{{$posts[0]->admin->name}}</a> on <a href="#" class="post-date">{{$category->posts[0]->created_at}}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                              <div class="col-12 col-md-6">      
                                       @foreach($category->posts as $i=>$post)
                                       @if($i >=1 )
                                            <!-- Single Blog Post -->
                                            <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="{{$post->image}}" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="{{route('single-post',['id'=>$post->id])}}" class="headline">
                                                        <h5>{{$post->title}}</h5>
                                                    </a>
                                                    <!-- Post Meta -->
                                                    <div class="post-meta">
                                                        <p><a href="#" class="post-author">{{$post->admin->name}}</a> on <a href="#" class="post-date">{{$post->created_at}}</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif 
                                       @if($i >= 4) @break @endif
                                         @endforeach
                                        </div>                                 
                                    </div>
                                </div>
                                 @endforeach
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
                                <div class="post-tag"><a href="#">{{$post->category->name}}</a></div>
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
               <div class="world-latest-articles">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="title">
                            <h5>Latest Articles</h5>
                        </div>
                         @foreach($posts as $i => $post)
                        <!-- Single Blog Post -->
                        <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="{{url($post->image)}}" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="{{route('single-post',['id'=>$post->id])}}" class="headline">
                                    <h5>{{$post->title}}</h5>
                                </a>
                               

                                <p>{{ substr(strip_tags($post->body), 0, 200). ' [....]' }}</p>

                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-author">{{$post->admin->name}}</a> on <a href="#" class="post-date">{{$post->created_at}}</a></p>
                                </div>
                                 <a href="{{route('single-post',['id'=>$post->id])}}" class='btn btn-primary pull-right'>Read More</a>
                            </div>
                        </div>
                        @if($i >= 3) @break @endif
                        @endforeach
                    </div>
                </div>
            </div>
  @endsection          