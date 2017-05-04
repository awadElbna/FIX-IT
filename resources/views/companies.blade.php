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
    <!-- Main component call to action -->
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="ti-home"></i> الرئيسية</a></li>
                <li class="active">شركات الصيانة</li>
            </ul>
        </div>
    </div>

    <!-- /.row  -->
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="row">
                <form class="col-sm-12" method="get" id="search-com-form">
                    <div class="search-company">
                        <input id="search-comp" type="text" class="search-input-comp" placeholder="ابحث عن الشركة "
                               name="name">
                        <button class="search-comp-button"><i class="ti-search"></i></button>
                    </div>
                </form>
                <div class="col-sm-12" id="search-results"></div>
            </div>

            <div class="companies-list">
                <div class="companies-links">
                    <ul class="nav nav-tabs">
                        <li><a id="all" data-toggle="tab" href="#category-1"> الكل</a></li>
                        <li><a data-toggle="tab" id="latest" href="#category-2"> المضاف حديثاً</a></li>
                        <li><a data-toggle="tab" id="top" href="#category-3"> الاعلى تقيماً</a></li>
                    </ul>
                    <h1 class="subtitles"> شركات الصيانة</h1>
                </div>

                <div class="tab-content">
                    <div id="category-1" class="tab-pane fade in active infinite-scroll">
                        @if(isset($companies))
                        @foreach($companies as $company)
                        <div class="company-block">
                            <div class="comp-image">
                                <a href="{{ URL('company') }}/{{ $company->id }}">
                                    <img @if($company->img) src="{{ url($company->img)}}"
                                          @endif  alt="{{$company->img}}">
                                </a>
                            </div>
                            <div class="company-det">
                                <a class="comp-title"
                                   href="{{ URL('company') }}/{{ $company->id }}">{{ $company->name }}</a>
                                <div class="sub-det">
                                    <div id="stars" class="pull-right">
                                        @for($i=0; $i<round($company->company->rating); $i++)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                        @for($i=5; $i>round($company->company->rating); $i--)
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    <span class="pull-left">
                                        <i class="ti-location-pin"> {{ $company->city }}</i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!--  -->
                    </div>
                    <div id="category-2" class="tab-pane fade ">
                    </div>
                    <div id="category-3" class="tab-pane fade">

                    </div>
                </div>
            </div>
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

@section('scripts')
<script src="{{asset('js/jquery.jscroll.min.js')}}"></script>
<script src="{{asset('js/manual-trigger.js')}}"></script>
<script type="text/javascript">
                var contentPage;
                $(document).ready(function () {
                    $("#search-comp").on("keyup", function (event) {
                        $("#search-results").empty();
                        $('.companies-list').show();
                        event.preventDefault();
                        var key = $("#search-comp").val();
                        $.ajax({
                            url: "{{URL('/companies/search')}}",
                            type: "GET",
                            data: {'key': key},
                            success: function (data) {
                                console.log(data);
                                $('#search-results').show();
                                render("#search-results", data.data);
                                contentPage = data.next_page_url;
                                console.log('content: ', contentPage);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    });

                    $("#all").on('click', function () {
                        $.ajax({
                            method: 'get',
                            data: {'all': 'all'},
                            success: function (data) {
                                console.log(data);
                                render('#category-1', data);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    });

                    $("#latest").on('click', function () {
                        $.ajax({
                            method: 'get',
                            data: {'latest': 'latest'},
                            success: function (data) {
                                console.log(data);
                                render('#category-2', data);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    });

                    $("#top").on('click', function () {
                        $.ajax({
                            method: 'get',
                            data: {'top': 'top'},
                            success: function (data) {
                                console.log(data);
                                render('#category-3', data);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    });

                    function render(id, data) {
                        console.log(data);
                        $(id).empty();
                        $.each(data, function (index, ele) {
                            var company_block = $('<div class="company-block"></div>');
                            var comp_image_block = $('<div class="comp-image"></div>');
                            var image_a_image = $('<img src="' + ele.img + '">');
                            var image_a = $('<a></a>').attr('href', "{{url('/company')}}/" + ele.id).append(image_a_image);
                            comp_image_block.append(image_a);
                            var company_det = $('<div class="company-det"></div>');
                            var comp_title = $('<a class="comp-title"></a>').attr('href', "{{url('/company')}}/" + ele.id).text(ele.name);
                            var sub_det = $('<div class="company-det"></div>');
                            var stars = $('<div id="stars" class="pull-right"></div>');
                            for (var i = 0; i < ele.rating; i++) {
                                stars.append($('<i class="fa fa-star"></i>'));
                            }
                            for (var i = 0; i < (5 - ele.rating); i++) {
                                stars.append($('<i class="fa fa-star-o"></i>'));
                            }
                            var city = $('<div class="pull-left" id="stars"></div>');
                            var city_i = $('<i class="ti-location-pin"></div>').text(ele.city);
                            city.append(city_i);
                            sub_det.append(stars, city);
                            company_det.append(comp_title, sub_det);
                            company_block.append(comp_image_block, company_det);
                            $(id).append(company_block);
                            if (id === "#search-results") {
                                $('.companies-list').hide();
                            }
                        });
                    }
                });
</script>
@endsection