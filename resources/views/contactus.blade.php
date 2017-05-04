@extends('layouts.app')
@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        <div class="col-sm-12 header-ann">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-2178725799240442"
                 data-ad-slot="4745084170"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="ti-home"></i> الرئيسية</a></li>
                <li class="active">اتصل بنا </li>
            </ul>
        </div>
    </div>

    <!-- /.row  -->
    <div class="row">
        <div class="col-md-6 registration">
            <div class="panel panel-default">
                <div class="panel-heading">اتصل بنا  </div>
                <form action="" method="POST">
                    {{csrf_field()}}
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user blue"></i></span>
                                <input type="text" name="InputName" placeholder="الاسم" class="form-control" autofocus="autofocus" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope blue"></i></span>
                                <input type="email" name="InputEmail" placeholder="البريد الالكتروني" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone blue"></i></span>
                                <input type="number" name="InputCno" placeholder="رقم الهاتف" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-comment blue"></i></span>
                                <textarea name="InputMessage" rows="6" class="form-control" type="text" required></textarea>
                            </div>
                        </div>
                        <div class="msg">
                            <button class="btn btn-info send" type="reset" value="Reset" name="reset" class="btn reset"> <span class="glyphicon glyphicon-refresh"></span> القيم الافتراضية</button>
                            <button type="submit" class="btn btn-success send"> <span class="glyphicon glyphicon-send"></span> ارسل</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-md-6">
            @foreach(Helper::settings() as $setting )                   
            <legend>مواقع التواصل الاجتماعي</legend>
            <div class="row social-box">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p class="p-mini">
                                <a href="{{$setting->fb_account}}">
                                    <i class='fa fa-facebook-square ico'></i>
                                </a>
                            </p>
                        </div>
                        <div class="panel-footer">
                            Facebook
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p class="p-mini">
                                <a href="{{$setting->tw_account}}">
                                    <i class='ti-twitter-alt ico'></i>
                                </a>
                            </p>
                        </div>
                        <div class="panel-footer">
                            Twitter
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p class="p-mini">
                                <a href="{{$setting->gp_account}}">
                                    <i class='ti-google ico'></i>
                                </a>
                            </p>
                        </div>
                        <div class="panel-footer">
                            Google+
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p class="p-mini">
                                <a href="{{$setting->yt_account}}">
                                    <i class='ti-youtube ico'></i>
                                </a>
                            </p>
                        </div>
                        <div class="panel-footer">
                            Google+
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 50px;">
                <legend>لمزيد من المعلومات</legend>
                <p class="text-align: left;">
                <address>
                    <i class='fa fa-envelope' style="color: #258cc3; margin-left: 3px; margin-bottom: 7px;"></i> {{$setting->support_email}}<br>
                    <i class='fa fa-envelope' style="color: #258cc3; margin-left: 3px; margin-bottom: 7px;"></i> {{$setting->webmaster_email}}<br>
                    <i class='glyphicon glyphicon-phone-alt' style="color: #258cc3; margin-left: 3px; margin-bottom: 7px;"></i>  {{$setting->phone}}
                </address>
                </p>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /.row  -->
</div>
<!-- /main container -->

@endsection
