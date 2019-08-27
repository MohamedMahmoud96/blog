@extends('admin.index')
  @section('title')
  blog
  @endsection

@section('content')
    <section class="content">
      <div class="row">

        <div class="col-md-12">
       <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title">Add slider Image</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

           
          
     <form class="form-horizontal" role="form" method="POST" action="{{route('admin.blog.slider')}}" enctype="multipart/form-data" style="height: 200px; margin-top: 20px">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md-6 offset-md-4" style="font-size: 15px">
                            <label for="" class="col-md-4 control-label" >Slider Image</label>

                                <input id="name" type="file" class="" name="image" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('iamge'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class='col-md-5'>
                            	  <input type="submit" name="" class='col-sm-4 btn-primary btn-blank center'>
                            </div>
                            
                        </div>

                    </form>

                </div>

@if($sliders)
  <div class='offset-md-2 col-sm-6 '>
	    
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  	

  	@foreach($sliders as $i => $slider)
    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="{{ $i == 0 ? 'active': '' }} "></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

  	@foreach($sliders as $i=>$slider)
    <div class="item {{ $i == 0 ? 'active': '' }} ">
      <img src="{{url($slider->image)}}" alt="...">
      <div class="carousel-caption">
     	<a href="{{route('admin.blog.delete-slider', ['id'=>$slider->id] )}}"><button class='btn-primary'>Delete</button></a>
      </div>

    </div>
    @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

 </div>

 	{{ $sliders->links() }}
@endif
   </div>
</section>





@endsection
