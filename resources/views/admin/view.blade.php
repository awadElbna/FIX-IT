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
    <body>
        <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
        <div id="page-container" class="fade page-container page-header-fixed page-sidebar-fixed page-with-two-sidebar page-with-footer">
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="" class="navbar-brand"><img src="" class="logo" alt="" /></a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown navbar-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="image"><img src="" alt="marwa" /></span>
                                <span class="hidden-xs">marwa</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href=""><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                                <li><a href=""><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="sidebar" class="sidebar">
                <div data-scrollbar="true" data-height="100%">
                    <ul class="nav">
                        <li class="nav-user">
                            <div class="image">
                                <img src="" alt="" />
                            </div>
                            <div class="info">
                                <div class="name dropdown">
                                    <a href="#" data-toggle="dropdown">marwa <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href=""><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                                        <li><a href=""><i class="fa fa-power-off"></i> Log Out</a></li>
                                    </ul>
                                </div>
                                <div class="position">Administrator</div>
                            </div>
                        </li>

                        <li>
                            <a href="">
                                <i class="fa fa-home"></i>
                                <span>Dashbaoard</span>
                            </a>
                        </li>
                         <li>
                            <a href="">
                                <i class="fa fa-cogs"></i>
                                <span>Settings/ SEO</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-picture-o"></i>
                                <span>Pages</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-picture-o"></i>
                                <span>Faqs</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-picture-o"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-picture-o"></i>
                                <span>Questions</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-picture-o"></i>
                                <span>User Contacts</span>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a href="#">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-folder-open"></i>
                                <span>Albums</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href=""><i class="fa fa-diamond"></i> Albums Categories</a></li>
                                <li><a href=""> <i class="fa fa-camera-retro"></i> Sessions</a></li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a href="#">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-newspaper-o"></i>
                                <span>Journal</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href=""><i class="fa fa-sitemap"></i> Journal Categories</a></li>
                                <li><a href=""> <i class="fa fa-file-text-o"></i> Journal Posts</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="">
                                <i class="fa fa-money"></i>
                                <span>Sessions Packages</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="sidebar-bg"></div>

            <div id="content" class="content">
                <ol class="breadcrumb pull-right">
                    <li><a href="">Home</a></li>
                    <li class="active">Albums</li>
                </ol>
                <h1 class="page-header">Albums</h1>
                <div class="section-container section-with-top-border">

                    <a href="" class="btn btn-primary btn-rounded add-new-record"><i class="fa fa-plus-square"></i>  Add</a>

                    <div class="panel pagination-inverse m-b-0 clearfix">
                        <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                            <thead>
                                <tr class="inverse">
                                    <th> Title</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr class="gradeA">
                                        <td>title here</td>
                                        <td>
                                            <a href="" class="btn btn-lime btn-rounded">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-rounded">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>title here</td>
                                        <td>
                                            <a href="" class="btn btn-lime btn-rounded">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-rounded">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>title here</td>
                                        <td>
                                            <a href="" class="btn btn-lime btn-rounded">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-rounded">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>title here</td>
                                        <td>
                                            <a href="" class="btn btn-lime btn-rounded">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-rounded">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>title here</td>
                                        <td>
                                            <a href="" class="btn btn-lime btn-rounded">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                            <a href="" class="btn btn-danger btn-rounded">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                          
                            </tbody>
                        </table>
                    </div>
                </div>


                <div id="footer" class="footer">
                    <span class="pull-right">
                        <a href="javascript:;" class="btn-scroll-to-top" data-click="scroll-top">
                            <i class="fa fa-arrow-up"></i> <span class="hidden-xs">Back to Top</span>
                        </a>
                    </span>
                    &copy; 2016 <a href="http://elmanawy.info">Marwa El-Manawy</a>  All Right Reserved
                </div>
            </div>
        </div>


    </body>
</html>
