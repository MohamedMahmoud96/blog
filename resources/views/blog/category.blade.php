  @extends('index')
  @section('title')
 Categories
  @endsection
  @section('content')

     <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
         <div class="col-12 col-lg-8">
               <div class="post-content-area mb-100">
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
                            @endforeach
                            
                                <li class="nav-item pull-right" style='margin-left:auto '>
                                   {{$categories->links()}}
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                            	
                                <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel" aria-labelledby="tab1">

                                @foreach($posts as $post)
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                                        <!-- Post Thumbnail -->
                                                  <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="{{$post->image}}" alt="">
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
           
    						@endforeach
    						    <div class="row">
                <div class="col-12">
                    <div class="load-more-btn mt-50 text-center">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
 							</div>
						 @foreach($categories as $category)
 							         <div class="tab-pane fade" id="{{$category->name}}" role="tabpanel" aria-labelledby="tab-{{$category->name}}">
                            @foreach($category->posts as $i=>$post)
                                    <!-- Single Blog Post -->
                                    <div class="single-blog-post post-style-4 d-flex align-items-center">
                                         
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
 										@if($i >= 5) @break @endif
 								@endforeach
 								   <div class="row">
                <div class="col-12">
                    <div class="load-more-btn mt-50 text-center">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
 							</div>
 							  <!-- Load More btn -->

         
	@endforeach
	  

                                </div>

                            </div>
                	</div>
        </div>
        @include('layouts.sidebar')
    </div>
  @endsection