@extends('admin.index')
@push('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{url('/adminPanel')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endpush
@push('js')
<script src="{{url('/adminPanel')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{url('/adminPanel')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{url('/adminPanel')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('/adminPanel')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
   
@endpush
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tags
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">Tags</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Created at</th>
                   <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @isset($tags)
                  @foreach($tags as $tag)
                <tr>
                  <td>{{$tag->id}}</td>
                  <td>{{$tag->name}} </td>
                  <td>{{$tag->slug}}</td>
                  <td>{{$tag->created_at}}</td>
                   <td>
                    <a href="{{route('admin.edit_tag', ['id'=> $tag->id])}}" class='btn  btn-info'>Edit</a>
                    <a href="{{route('admin.delete_tag', ['id'=> $tag->id])}}" class='btn  btn-danger'>Delet</a>
                  </td>
                </tr>
                @endforeach
                @endisset
                
              
                </tbody>
                <tfoot>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Created at</th>
                   <th>Action</th>
                 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
   @endsection 