<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Source Admin | Login Page</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Nunito:400,300,700" rel="stylesheet" id="fontFamilySrc" />

        <link href="{{ asset('admin/js/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/js/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/js/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/css/animate.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/js/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/js/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />	
        <link href="{{ asset('admin/js/plugins/summernote/dist/summernote.css')}}" rel="stylesheet" />
        <script src="{{ asset('admin/js/plugins/pace/pace.min.js')}}"></script>
        <link href="{{ asset('admin/js/plugins/bootstrap-calendar/css/bootstrap_calendar.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/js/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('admin/js/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
        <script src="{{ asset('admin/js/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/jquery-ui/ui/minified/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.time.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.stack.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.crosshair.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/jquery.flot.categories.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/flot/CurvedLines/curvedLines.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/gritter/js/jquery.gritter.js')}}"></script>
        <script src="{{ asset('admin/js/page-index.demo.min.js')}}"></script>
        <script src="{{ asset('admin/js/page-index.demo.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('admin/js/page-table-manage.demo.min.js')}}"></script>
        <script src="{{ asset('admin/js/demo.js')}}"></script>
        <script src="{{ asset('admin/js/apps.js')}}"></script>
         <script>
            $(document).ready(function () {
                App.init();
                Demo.init();
                PageDemo.init();
            });
        </script>
    </head>
    <body class="pace-top">
        <!-- begin #page-loader -->
        <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-container">
            <!-- begin login -->
            <div class="login">
                <!-- begin login-brand -->
                <div class="login-brand bg-inverse text-white">
                    <img src="assets/img/logo-white.png" height="36" class="pull-right" alt="" /> Login Panel
                </div>
                <!-- end login-brand -->
                <!-- begin login-content -->
                <div class="login-content">
                    <h4 class="text-center m-t-0 m-b-20">Great to have you back!</h4>
                    <form action="index.html" method="POST" name="login_form" class="form-input-flat">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="Email Address" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" placeholder="Password" />
                        </div>
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lime btn-lg btn-block">Sign in to your account</button>
                            </div>
                        </div>
                        <div class="text-center">
                            New here? <a href="extra_register.html" class="text-muted">Create a new account</a>
                        </div>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end login -->
        </div>
        <!-- end page container -->

    </body>
</html>
