<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url(authAdmin()->user()->image)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{authAdmin()->user()->name}}</span>
            </a>
          
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url(authAdmin()->user()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{authAdmin()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="{{route('admin.home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
             </a>
       </li>

          <li class="treeview">
          <a href="">
            <i class="fa fa-circle-o"></i> <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('admin.blog')}}"><i class="fa fa-circle-o"></i> Sliders</a></li>
            
          </ul>
        </li>
         

           <li class=" treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Admins</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
             <ul class="treeview-menu">
            <li class=""><a href="{{route('admin')}}"><i class="fa fa-circle-o"></i>Admins</a></li>
            <li><a href="{{route('admin.create')}}"><i class="fa fa-circle-o"></i> Add Admin</a></li>
          </ul>
        </li>

             <li class=" treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Posts</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li class=""><a href="{{route('admin.posts')}}"><i class="fa fa-circle-o"></i> Posts</a></li>
            <li><a href="{{route('admin.create_post')}}"><i class="fa fa-circle-o"></i> Add Post</a></li>
          </ul>
        </li>
         <li class=" treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Categories</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li class=""><a href="{{route('admin.categories')}}"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li><a href="{{route('admin.create_category')}}"><i class="fa fa-circle-o"></i> Add Category</a></li>
          </ul>
        </li>  

         <li class=" treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Tags</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>  
            </span>
          </a>
           <ul class="treeview-menu">
            <li class=""><a href="{{route('admin.tags')}}"><i class="fa fa-circle-o"></i> Tags</a></li>
            <li><a href="{{route('admin.create_tag')}}"><i class="fa fa-circle-o"></i>Add Tag</a></li>
          </ul>
        </li> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>