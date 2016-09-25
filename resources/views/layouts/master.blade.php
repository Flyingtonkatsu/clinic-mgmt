<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content= "<?php echo csrf_token() ?>" />
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link type="text/css" href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link type="text/css" href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Font-awesome -->
    <link type="text/css" href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link type="text/css" href="/css/custom.css" rel="stylesheet">
   

    <title>Vets in Practice</title>

  </head>

  <body>

    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Vets in Practice
                    </a>
                </li>

                <li class="sidebar-nav-head">
                    @yield('taskbar-head')
                </li>

                @yield('taskbar')

                <li class="pull-down"> 
                    @if(Auth::user()->access_id == 0)
                    <a href="index"><i class="fa fa-th"></i> Back to Modules
                    @endif
                    <a href="logout"><i class="fa fa-sign-out"></i> Logout {{Auth::user()->username}}</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div id="alert-message" hidden="true">    
                </div>

                <div class="row">
                    <div class="col-md-12" id="page-content">   
                    </div>
                </div>

                @yield('content')

            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>

    <!-- Scripts -->
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/jquery.mobile-1.4.5.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/ajax-setup.js"></script>
        <script src="js/utils.js"></script>
        @yield('scripts')
    </body>

</html>
