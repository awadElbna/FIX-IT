@extends('layouts.app')
@section('content')
<!--START BANNER HOME-->
<section class="banner-home" style="background-image: url('{{ asset('images/banner.jpg') }}')">
    <div class="img-overlay"></div>
    <div class="home-search">
        <form class="container" action="{{url('/search')}}">
            <p>فيكسيت اكبر منصة لحلول مشاكل السوفتوير و الهاردوير</p>
            <div class="search-banner">
                <input type="text" placeholder="ابحث عن مشكلتك " data-searchurl="search?=" name="question">
                <button type="submit" class="search-btn">ابحث</button>
            </div>
        </form>
    </div>
</section>
<!--END BANNER HOME-->

<!--START HOW TO SECTI HOME-->
<section class="about-features">
    <div class="container">
        <div class="row">
            <div class="super-title">
                <h2>كيف التعامل مع الموقع</h2>
                <div class="seperator"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="iconbox-center">
                    <div class="icon">
                        <span class="ti-user"></span>
                    </div>
                    <h4>سجل بالموقع</h4>
                   <p> قم بالتسجيل بالموقع كصاحب شركة او كمستخدم عادي بدون اي قيود</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="iconbox-center">
                    <div class="icon">
                        <span class="ti-pencil-alt"></span>
                    </div>
                    <h4>اسأل سؤالك</h4>
                    <p> قم بإضافة استفسارك و تلقى الاجابات و العروض من شركات الصيانة و المستخدمين ايضاً</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="iconbox-center">
                    <div class="icon">
                        <span class="ti-thumb-up"></span>
                    </div>
                    <h4>كن ع اتصال مع شركتك</h4>
                    <p> بعد اختيارك للعرض المناسب قم بالتواصل مع الشركة لحل مشكلتك  </p>
                </div>
            </div>
        </div>
    </div><!-- End Container -->
</section><!-- End Section -->
<!--END START HOW TO SECTI HOME-->


<!--START QUESTION IN HOME-->
<section class="questions-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs">
                    @if(isset($cats))
                    @foreach($cats as $cat)
                    <li><a data-toggle="tab" href="#category_{{$cat->id}}"> {{$cat->title}}</a></li>
                    @endforeach
                    @endif
                </ul>

                <h1 class="subtitles">احدث الاسئلة</h1>
                <div class="tab-content">
                    @if(isset($cats))
                    @foreach($cats as $cat)
                    <div id="category_{{ $cat->id }}" class="tab-pane fade">
                        @if(isset($questions))
                        @foreach($questions as $question)
                        @if($cat->id == $question->cat_id)
                        <div class="question-block">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="row">
                                        <span class="data-icons col-sm-4">
                                            {{ $question->visited }}
                                            <i class="fa fa-eye"></i>
                                        </span>
                                        <span class="data-icons col-sm-4">
                                            {{ $question->allComments->count()}}
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
                                            <h2 class="question-title-block"><a href="{{ URL('question') }}/{{ $question->id }}">{{ $question->title }}</a></h2>
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="{{ URL('userProfile') }}/{{ $question->user->id }}" class="qustion-user">
                                                <i class="ti-user"></i>
                                                {{ $question->user->name }}
                                            </a>

                                            <a href="{{ URL('/questions') }}" class="qustion-user">
                                                <i class="ti-tag"></i>
                                                {{ $question->cat->title }}
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
                        @endif
                        @endforeach
                        @endif
                    </div>
                    @endforeach
                    @endif
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
                <div class="most-rated-comp">
                    <h2>
                        <i class="ti-cup"></i>
                        اعلى الشركات تقيماً
                    </h2>
                    <div class="main-comp-block-top">
                        @if(isset($top_rated))
                        @foreach($top_rated as $top)
                        <div Class="company-rate-block">
                            <a href="{{ URL('company') }}/{{ $top->user->id }}">
                                <img @if(isset($top->user->img)) src="{{ url($top->user->img)}}" @endif  alt="{{ $top->user->name }}">
                            </a>
                            <div class="copmnyrate">
                                <a href="{{ URL('company') }}/{{ $top->user->id }}" class="comp-title">{{ $top->user->name }}</a>
                                <ul id="stars">
                                    @for($i=0; $i<round($top->rating); $i++)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                        @for($i=5; $i>round($top->rating); $i--)
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endfor
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 footer-ann">
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
</section>
<!--END QUESTION IN HOME-->
@endsection
