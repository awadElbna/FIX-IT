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
                <li class="active"> الأسئلة الشائعة</li>
            </ul>
        </div>
    </div>

    <!-- /.row  -->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 fas">
            @foreach($faqs as $faq)
            <div class="panel-group" id="accordion">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#{{ $faq->id }}"> {{ $faq->question }}</a> </h4>
                    </div>
                    <div id="{{ $faq->id }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p>
                                {{ $faq->answer }}
                                <br>
                            </p>                                    
                        </div>
                    </div>
                </div>
            </div>
            @endforeach 
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="anouncment-sidebar">
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
    </div>
    <!-- /.row  -->
</div>
<!-- /main container -->


@endsection
