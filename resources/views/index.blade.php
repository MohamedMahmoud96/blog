@include('layouts.header')
@include('layouts.navbar')
@yield('slider')
<div class="main-content-wrapper section-padding-100">
       <div id='main-container' class="container ">
       		@yield('content')

		</div>
  </div>
@include('layouts.footer')
