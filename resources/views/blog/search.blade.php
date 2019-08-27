
      <div class="world-latest-articles">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="title">
                            <h5>search</h5>
                        </div>
                         @foreach($posts as $post)
                        <!-- Single Blog Post -->
                        <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                        
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
                        @endforeach
                       @if($noFound != null)<p>{{$noFound}}</p>@endif
                    </div>
                </div>
            </div>
  