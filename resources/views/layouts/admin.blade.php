@if(auth()->user() && auth()->user()->group_id === 3)
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Salahly | Admin Panel</title>
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

        @yield('styles')
    </head>
    <body>
        <div id="page-loader" class="page-loader fade in"><span class="spinner">Loading...</span></div>
        <div id="page-container" class="fade page-container page-header-fixed page-sidebar-fixed page-with-two-sidebar page-with-footer">
            <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="" class="navbar-brand"><img src="{{ asset('images/logo2.png') }}" class="logo" alt="" /></a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown navbar-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="image"><img src="{{ asset(auth()->user()->img) }}" alt="" /></span>
                                <span class="hidden-xs">{{auth()->user()->name}}</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                {{--<li><a href=""><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>--}}
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <div id="sidebar" class="sidebar">
                <div data-scrollbar="true" data-height="100%">
                    <ul class="nav">
                        <li class="nav-user">
                            <div class="image">
                                <img src="{{ asset(auth()->user()->img) }}" alt="" />
                            </div>
                            <div class="info">
                                <div class="name dropdown">
                                    <a href="#" data-toggle="dropdown">{{auth()->user()->name}} <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        {{--<li><a href=""><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>--}}
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                <i class="fa fa-power-off"></i> Log Out</a></li>
                                    </ul>
                                </div>
                                <div class="position">Administrator</div>
                            </div>
                        </li>

                        <li>
                            <a href="{{ url('/ad/dashboard') }}">

                                <i class="fa fa-home"></i>
                                <span>Dashbaoard</span>
                            </a>
                        </li>
                        <li>

                            <a href="{{ url('/ad/settings') }}">

                                <i class="fa fa-cogs"></i>
                                <span>Settings/ SEO</span>
                            </a>
                        </li>
                        <li>

                            <a href="{{ url('/ad/pages') }}">
                                <i class="fa fa-file-text-o"></i>
                                <span>Pages</span>

                            </a>
                        </li>
                        <li>
                            <a href="{{url('ad/users')}}">


                                <i class="fa fa-users"></i>
                                <span>Users</span>

                            </a>
                        </li>
                        <li>
                            <a href="{{url('/ad/faqs')}}">
                                <i class="fa fa-info-circle"></i>
                                <span>Faqs</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/ad/categories') }}">
                                <i class="fa fa-sitemap"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/ad/questions')}}">
                                <i class="fa fa-question-circle"></i>
                                <span>Questions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/ad/rate')}}">
                                <i class="fa fa-handshake-o"></i>
                                <span>User Communications</span>
                            </a>
                        </li>


                        <li class="has-sub">
                            <a href="#">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-newspaper-o"></i>

                                <span>companies</span>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{url('/ad/companies')}}"><i class="fa fa-sitemap"></i>all companies</a></li>
                                <li><a href="{{url('/ad/trashedcompanies')}}"> <i class="fa fa-file-text-o"></i> trashed companies</a>
                                </li>
                                <li><a href="{{url('/ad/aprove')}}"> <i class="fa fa-file-text-o"></i>waiting to aprove</a>
                                </li>
                            </ul>
                        </li>

                        
                        
                    </ul>
                </div>
            </div>
            <div class="sidebar-bg"></div>

            <div id="content" class="content">

                @yield('content')


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

        <script src="{{ asset('admin/js/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/jquery-ui/ui/minified/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('admin/js/plugins/pace/pace.min.js')}}"></script>
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
        @yield('scripts')
    </body>
</html>
@elseif(auth()->user() && (auth()->user()->group_id === 2 || auth()->user()->group_id === 1))
    <script type="text/javascript">
        window.location = "{{ url('/') }}";//here double curly bracket
    </script>
@else
    <script type="text/javascript">
        window.location = "{{ url('/login') }}";//here double curly bracket
    </script>
@endif