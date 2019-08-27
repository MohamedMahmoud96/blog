@extends('admin.index')

@section('content')
  
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <h1 class="box-title">Add tag</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">tags</a></li>
        <li class="active">Add tag</li>
      </ol>
    </section>
  <!-- Main content  -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
       <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title">Add tag</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              @include('include.messages')    
            <form role="form" action="{{route('admin.store_tag')}}" method='post'>
              @csrf
              @method('post')
              <div class="box-body">
                <div class=' ml-md-auto col-md-6'>
                <div class="form-group">
                  <label for="InputTitle">tag Name</label>
                  <input type="text" class="form-control tag_title" name='name' id="InputTitle" placeholder="" value='{{old("title")}}'>
                </div>
                <div class="form-group">
                  <label for="InputSlug">tag slug</label>
                  <input type="text" class="form-control tag_slug" name='slug' id="InputSlug" placeholder="">
                </div>

                 
              </div>
          </div>
              <!-- /.box-body -->
  <!-- /.box-body -->
                <div class="box-footer">
              
              <input type="submit" class="btn btn-primary">
              <a href="{{ route('admin.tags') }}" class="btn btn-warning">Back</a>
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