@extends('layouts.app')


@section('content')

    @if(isset($questions))

        <!-- /.Fixed navbar  -->
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
                        <li><a href="{{url('/')}}"><i class="ti-home"></i> الرئيسية</a></li>
                        <li class="active">الأسئلة</li>
                    </ul>
                </div>
            </div>
            <!-- /.row  -->

            <div class="row">
                <!--left column-->
                <form class="col-lg-3 col-md-3 col-sm-12" method="get" id="search-com-form"
                      action="{{url('/questions/search')}}">
                    <div class="questions-filter col-sm-12">
                        <div class="row">
                            <div class="search-company">
                                <input id="search-comp" type="text" class="search-input-comp"
                                       placeholder="ابحث عن سؤال "
                                       name="advancedSearch">
                                <button class="search-comp-button"><i class="ti-search"></i></button>
                            </div>

                        </div>
                        <div class="panel-group" id="accordionNo">
                            <!--Category-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapseCategory" class="collapseWill">
                                            <span class="pull-left"> <i class="fa fa-caret-left"></i></span>
                                            القسم
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseCategory" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <ul class="nav nav-pills nav-stacked tree">
                                            @if(isset($cats))
                                                @foreach($cats as $cat)
                                                    <li><a href="{{url('/questions/cat')}}/{{$cat->id}}"> <span
                                                                    class="badge pull-right">{{$cat->questions->count()}}</span>{{$cat->title}}
                                                        </a></li>
                                                    {{--<li><a href="#"> <span class="badge pull-right">42</span>قسم الهاردوير </a></li>--}}
                                                    {{--<li><a href="#"> <span class="badge pull-right">42</span>قسم ثالث </a></li>--}}
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/Category menu end-->


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapseBrand" class="collapseWill">
                                            <span class="pull-left"> <i class="fa fa-caret-left"></i></span>
                                            البحث ب
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseBrand" class="panel-collapse collapse in">
                                    <div class="panel-body smoothscroll maxheight300">
                                        <div class="block-element">
                                            <label>

                                                <input type="checkbox" class="hide-checkbox" name="all" value="all"/>
                                                الكل </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" class="hide-checkbox" name="open" value="open"/>
                                                الاسألة المفتوحة </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" class="hide-checkbox" name="last" value="last"/>
                                                المضاف حديثا </label>
                                        </div>
                                        <div class="block-element">
                                            <label> &nbsp; </label>
                                            <!-- keep it blank // -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#collapseBrand" class="collapseWill">
                                            <span class="pull-left"> <i class="fa fa-caret-left"></i></span>
                                            المحافظة
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseBrand" class="panel-collapse collapse in">
                                    <div class="panel-body smoothscroll maxheight300">
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" class="hide-checkbox" name="cairo"
                                                       value="القاهره"/>
                                                القاهره
                                            </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" class="hide-checkbox" name="giza"
                                                       value="الجيزه"/>
                                                الجيزه </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" name="sharq" class="hide-checkbox"
                                                       value="الشرقيه"/>
                                                الشرقيه </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" name="alex" class="hide-checkbox"
                                                       value="الاسكندريه"/>
                                                الاسكندريه </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" name="damit" class="hide-checkbox"
                                                       value="دمياط"/>
                                                دمياط </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" name="gharb" class="hide-checkbox"
                                                       value="الغربيه"/>
                                                الغربيه </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" name="mnof" class="hide-checkbox"
                                                       value="المنوفيه"/>
                                                المنوفيه </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" class="hide-checkbox" name="matrouh"
                                                       value="مطروح"/>
                                                مطروح </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" name="kafr" class="hide-checkbox"
                                                       value="كفرالشيخ"/>
                                                كفرالشيخ </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" class="hide-checkbox" name="almenia"
                                                       value="المنيا"/>
                                                المنيا </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" class="hide-checkbox" name="asut" value="اسيوط"/>
                                                اسيوط </label>
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input class="hide-checkbox" type="checkbox" name="kena" value="قنا"/>
                                                قنا </label>
                                            <!-- keep it blank // -->
                                        </div>
                                        <div class="block-element">
                                            <label>
                                                <input type="checkbox" class="hide-checkbox" name="sohage"
                                                       value="سوهاج"/>
                                                سوهاج </label>
                                            <!-- keep it blank // -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/brand panel end-->


                        </div>
                    </div>
                </form>
                <!--right column-->

                <div class="col-lg-9 col-md-9 col-sm-12 all-questions">
                    <div class="row">

                        @if(Auth::user() && count($cats)>0)

                            <div class="col-sm-12">
                                <div class="widget-area no-padding blank">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(Auth::user() && Auth::user()->group_id == 1)
                                        <div class="status-upload">
                                            <form method="post" action="{{ URL('/question') }}"
                                                  enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="text" name="title" placeholder="عنوان المشكله">
                                                <textarea name="desc" placeholder="اكتب مشكلتك"></textarea>
                                                <ul>
                                                    <li class="upload-img-icon">
                                                        <a title="" data-toggle="tooltip" data-placement="bottom"
                                                           data-original-title="اضف صورة"><input type="file" name="img"><i
                                                                    class="ti-image"></i></a>
                                                    </li>
                                                    <li class="">
                                                        <select name="cat_id">
                                                            @foreach($cats as $cat)
                                                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </li>
                                                </ul>
                                                <button type="submit" class="btn btn-success green"><i
                                                            class="fa fa-share"></i>
                                                    نشر
                                                </button>
                                            </form>
                                        </div><!-- Status Upload  -->
                                </div><!-- Widget Area -->
                                @endif
                            </div>
                        @endif

                        @if(isset($questions))
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div id="category-1" class="tab-pane fade in active infinite-scroll">
                                    @foreach($questions as $question)
                                        <div class="question-block">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="row">
                                        <span class="data-icons col-sm-4">
                                            {{ $question->visited }}
                                            <i class="fa fa-eye"></i>
                                        </span>
                                                        <span class="data-icons col-sm-4">
{{--                                            {{ $question->numOfComments}}--}}
                                                            <i class="ti-thought"></i>
                                        </span>
                                                        <span class="data-icons col-sm-4">
                                            {{ $question->status }}
                                                            <i class="ti-info-alt"></i>
                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10 question-desc">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <h2 class="question-title-block"><a
                                                                        href="{{ URL('question') }}/{{ $question->id }}">{{ $question->title }}</a>
                                                            </h2>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <a href="#" class="qustion-user">
                                                                <i class="ti-user"></i>
                                                                {{ $question->name }}
                                                            </a>

                                                            <a href="#" class="qustion-user">
                                                                <i class="ti-tag"></i>
                                                                {{ $question->cat_name }}
                                                            </a>
                                                            <span class="qustion-user">
                                                <i class="ti-timer"></i>
                                                                {{ $question->created }}
                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{--{{ $questions->links() }}--}}
                                </div>
                            </div>
                        @endif
                    </div>

                    <!--/.category-top-->

                </div>

                <!--/right column end-->
            </div>
            <!-- /.row  -->
        </div>
        <!-- /main container -->


    @else
        <h1>This category has no questions</h1>
    @endif
@endsection