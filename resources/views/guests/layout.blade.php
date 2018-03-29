<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('dist/css/sb-admin-2.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/morrisjs/morris.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-primary navbar-static-top" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! asset('/') !!}}">Mumias Law Court</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            @if(Sentinel::check())
                <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ Sentinel::check()->first_name }}</a></li>
            @endif
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    @if(Sentinel::check())
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ Sentinel::check()->first_name }}</a></li>
                    @endif
                    {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>--}}
                    <li class="divider"></li>
                    @if(Sentinel::check())
                        <li><a href="{{ asset('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
                    @else
                        <li><a href="{{ asset('login') }}"><i class="fa fa-sign-out fa-fw"></i> Login</a> </li>
                    @endif
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="{!! asset('magistrate') !!}"><i class="fa fa-dashboard fa-fw"></i> </a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-files-o fa-files"></i> Calendar <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">View Calendar</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-files-o fa-files"></i> Case Files <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">View Files</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="text-center">@include('Centaur::notifications')</div>
        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{!! asset('vendor/metisMenu/metisMenu.min.js') !!}"></script>

<!-- Morris Charts JavaScript -->
<script src="{!! asset('vendor/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('vendor/morrisjs/morris.min.js') !!}"></script>
<script src="{!! asset('data/morris-data.js') !!}"></script>

<!-- Custom Theme JavaScript -->
<script src="{!! asset('dist/js/sb-admin-2.js') !!}"></script>

<script src="{!! asset('vendor/datatables/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') !!}"></script>
<script src="{!! asset('vendor/datatables-responsive/dataTables.responsive.js') !!}"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>
