 <!-- ********** Hero Area Start ********** -->
    <div class="hero-area">

        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
            @foreach($sliders as $slider)
            <!-- Single Slide -->
            <div class="single-hero-slide bg-img background-overlay" style="background-image: url('{{url($slider->image) }}');"></div>
          
            @endforeach
        </div>

        <!-- Hero Post Slide -->
        <div class="hero-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-post-slide">
                            @foreach($sliderPosts as $i => $sliderPost)
                            <!-- Single Slide -->
                            <div class="single-slide d-flex align-items-center">
                                <div class="post-number">
                                    <p>{{$i+1}}</p>
                                </div>
                                <div class="post-title">
                                    <a href="{{route('single-post',['id'=>$sliderPost->id])}}">{{$sliderPost->title}}</a>
                                </div>
                            </div>
                            @endforeach
                            
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ********** Hero Area End ********** -->