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

<link type="text/css" href="/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="/css/bootstrap-theme.min.css" rel="stylesheet">
<link type="text/css" href="/css/font-awesome.min.css" rel="stylesheet">
<link type="text/css" href="/css/custom.css" rel="stylesheet">


<title>Vets in Practice</title>

</head>

<body>
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <li class="sidebar-brand">
                        <a href="/">  Vets in Practice </a>
                    </li>

                    @yield('taskbar')

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user()->access_id == 0)
                    <li>
                        <a href="index"><i class="fa fa-th"></i> Back to Modules</a>
                    </li>
                    @endif
                    <li>
                        <a href="logout"><i class="fa fa-sign-out"></i> Logout {{$employee->firstname}}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div id="alert-message" hidden="true">    
        </div>

        <div class="row">
            <div class="col-md-12" id="page-content">   
            </div>
        </div>

        @yield('content')
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
