@extends('admin.index')
@push('css')
  <link rel="stylesheet" href="{{url('/adminPanel')}}/bower_components/select2/dist/css/select2.min.css">
@endpush
@push('js')
  <script src="{{url('/adminPanel')}}/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script >  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   })
  </script>
   
@endpush
@section('content')
	
	  <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <h1 class="box-title">Add Post</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('admin.posts')}}">Posts</a></li>
        <li class="active">Add Post</li>
      </ol>
    </section>
  <!-- Main content  -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
       <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title">Add Post</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              @include('include.messages')    
            <form role="form" action="{{route('admin.store_post')}}" method='post' enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="box-body">
              	<div class=' ml-md-auto col-md-6'>
                <div class="form-group">
                  <label for="InputTitle">Post Title</label>
                  <input type="text" class="form-control post_title" name='title' id="InputTitle" placeholder="" value='{{old("title")}}'>
                </div>
                <div class="form-group">
                  <label for="InputSlug">Post slug</label>
                  <input type="text" class="form-control post_slug" name='slug' id="InputSlug" placeholder="" value='{{old("slug")}}'>
                </div>
                    <!-- select -->
                <div class="form-group" >
                  <label>Select Category</label>
                 
                  <select class="form-control category" name='category'>
                    <option></option>
                    @foreach($categories as $category)
                      <option value='{{$category->id}}'> {{$category->name}} </option>
                    @endforeach
                  </select>
                </div>
                  <!-- Select multiple-->
                 <div class="form-group" style="margin-top:18px;">
                <label>Select Tags</label>
            
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select Tags"
                        style="width: 100%;" name='tag' value='{{old("tag")}}'>
                   @foreach($tags as $tag)
                      <option value='{{$tag->id}}'> {{$tag->name}} </option>
                    @endforeach
               
                </select>
              </div>

              <div class="box-header">
              <h3 class="box-title">Write Posts Body Here
                <small>Simple and fast</small>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea class="textarea post_body" placeholder="Place some text here" name='body' value='{{old("body")}}'
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('body')}}</textarea>
            </div>
              
              
              </div>
              <div class='col-sm-4'>
                  <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name='image' value='{{old("image")}}'>
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                 <div class="checkbox">
                  <label>
                    <input type="checkbox" value='1' class='' name='slider' value='{{old("status")}}'> Add To Slider
                  </label>
                </div>
             

              </div>
          </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <div class="box">
           
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
 
    <!-- /.content -->
@endsection