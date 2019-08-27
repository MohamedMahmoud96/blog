@extends('admin.index')

@section('content')
	
	  <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <h1 class="box-title">Edit Admin</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admins</a></li>
        <li class="active">edit admin</li>
      </ol>
    </section>
  <!-- Main content  -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
       <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h1 class="box-title">edit {{$admin->name}}</h1>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              



     <form class="form-horizontal" role="form" method="POST" action="{{route('admin.update', ['id'=>$admin->id])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$admin->name }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $admin->email }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>
                       <div class="form-group">
                          <label for="exampleInputFile" class="col-md-4 control-label">Image</label>
                          <div class="col-md-6">
                            <img src="{{url($admin->image)}}">
                            <input type="file" id="exampleInputFile" name='image' value='{{old("image")}}'>
                             @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                          </div>
                       </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   edit
                                </button>
                            </div>
                        </div>
                    </form>
           
          </div>
         
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
 
    <!-- /.content -->
@endsection
