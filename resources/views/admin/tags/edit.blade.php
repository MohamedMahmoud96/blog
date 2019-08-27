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
      <h1 class="box-title">Edit tag</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">tags</a></li>
        <li class="active">Edit tag</li>
      </ol>
    </section>
  <!-- Main content  -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
       <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title"></h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @include('include.messages') 

            <form role="form" action="{{route('admin.update_tag', ['id'=> $tag->id]) }}" method='post'>
            	@csrf
            	@method('post')
              <div class="box-body">
              	<div class=' ml-md-auto col-md-6'>
                <div class="form-group">
                  <label for="InputTitle">tag Title</label>
                  <input type="text" class="form-control tags_title" name='name' id="InputTitle" placeholder="" value='{{$tag->name}}'>
                </div>
                <div class="form-group">
                  <label for="InputSlug">tag slug</label>
                  <input type="text" class="form-control tag_slug" name='slug' id="InputSlug" placeholder="" value='{{$tag->slug}}'>
                </div>
              <!-- /.box-body -->
                <div class="box-footer">
              
              <input type="submit" class="btn btn-primary">
              <a href="{{ route('admin.categories') }}" class="btn btn-warning">Back</a>
            </div>
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