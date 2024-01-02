<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/favicon" />

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 

        <title>@yield('title')</title>
		 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	
        
        <link href="{{ asset('css/lib/all.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/lib/admin.css') }}" rel="stylesheet" type="text/css">
       
        <link href="{{ asset('css/common/style.css') }}?v={{ filemtime('css/common/style.css') }}" rel="stylesheet">
		<script src="/app.js" defer></script>
		<link rel="manifest" href="/manifest.json">

      
		
		<meta name="apple-mobile-web-app-status-bar" content="#0a759f" />
<meta name="theme-color" content="#0a759f" />

        @yield('dynamic_css_link')
        <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    </head>
    @auth
    <body id="page-top">
       

        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- top navigation -->

           @include('admin.layouts.left-sidebar')

            <!-- /top navigation -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- Left Menu -->
                    @include('admin.layouts.top-header')

                        <!-- page content -->
                        @yield('content')
                        <!-- /page content -->
                </div>
                <!-- footer content -->
                @include('admin.layouts.footer')
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                </div>
              </div>
            </div>
        </div>
    </body>
    @endauth
    <!-- If guest user on login page -->
    @guest
    <body class="login-img h100vh" style="background: url('/images/bg.jpg') ; background-size: cover;background-position: right;">
        <div class="overlay-bg"></div>
        @yield('content')     
    </body>
    @endguest

     
    <!-- jQuery -->
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
    <!-- Core plugin lib -->
    <script src="{{ asset('js/lib/jquery.easing.min.js') }}" ></script>
    <!-- vailidation lib -->
    <script src="{{ asset('js/lib/jquery.validate.min.js') }}"></script>
    <!-- Core plugin lib -->
    <script src="{{ asset('js/lib/admin.min.js') }}"></script>
    

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/common/script.js') }}?v={{ filemtime('js/common/script.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css">

    <!--sumbernote js links -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
     <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/40.0.0/ckeditor.min.js"></script>
        
     <script>
         $(document).ready(function() {
             $("#mysummernote").summernote();
             $('.dropdown-toggle').dropdown();
         });
     </script>
     <script>
ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
  console.error(error);
});

     </script>

</html>