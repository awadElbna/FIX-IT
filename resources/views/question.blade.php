@extends('layouts.app')
@section('content')
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
                <li><a href="{{url('/questions')}}"> الأسئلة</a></li>
                <li class="active">{{$question->title}}</li>
            </ul>
        </div>
    </div>
    <!-- /.row  -->
    <div class="row">
        <!--START RIGHT SIDE-->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="row">
                 <!--START SHOW ERRORS FOR ADD/EDIT-->
        @if (count($errors) > 0)
        <div class="show-errors alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!--END SHOW ERRORS FOR ADD/EDIT-->
                <div class="col-sm-8">
                    <div class="question-user-img">
                        <img src="@if( $question->user->img){{ url($question->user->img) }}@endif">
                        <a href="{{url('/userProfile')}}/{{$question->user->id}}">
                            {{$question->user->name}}
                        </a>
                    </div>
                </div>
                <!--********** check status *********-->
                @if(Auth::id() && Auth::id() == $question->user_id)
                <div class="col-sm-4">
                    <form method="post" id="my_form" class="colsed-question">

                        @if($question->status === 'closed')
                        <label>
                            <input type="checkbox"  name="tour" value="closed" checked>
                            <input type="hidden" id="hidden" value="{{ csrf_token() }}">
                            تم حلها
                        </label>
                        @else
                        <label id="chkbtn">
                            <input type="checkbox" class="check" name="tour" value="open" >
                            <input type="hidden" id="hidden" value="{{ csrf_token() }}" class="btn btn-lg">
                            تم حلها
                        </label>
                        @endif
                    </form>
                    <a href="{{url('/question/delete')}}/{{$question->id}}" class="delete-qtn btn btn-danger"><i class="ti-trash"></i></a>
                    <a href="#edit_question" data-toggle="modal" class="delete-qtn btn btn-success"><i class="ti-pencil-alt"></i></a>
                </div>
                @endif
                @if($question->status === 'closed' && Auth::id() != $question->user_id )
                <div class="col-sm-4">
                    <span class="colsed-question"><i class="ti-lock"></i> تم حل السؤال واغلاقه من قبل المستخدم</span>
                </div>
                @endif
                <!--************* end check status **********-->
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <h1 class="question-title">{{$question->title}}</h1>
                    <a href="{{url('/questions')}}" class="qustion-user">
                        <i class="ti-tag"></i>
                        {{$question->cat->title}}
                    </a>
                </div>
                <div class="col-sm-12">
                    <div class="question-header">
                        <span class="qustion-user">
                            <i class="fa fa-eye"></i>
                            {{$question->visited}}
                        </span>
                        <span class="qustion-user">
                            <i class="ti-thought"></i>
                            {{$question->allComments->count()}}
                        </span>
                        @if($question->status === 'open')
                        <span class="qustion-user">
                            <i class="ti-info-alt"></i>
                            مفتوح
                        </span>
                        @else
                        <span class="qustion-user">
                            <i class="ti-info-alt"></i>
                            مغلق
                        </span>
                        @endif
                        <span class="qustion-user">
                            <i class="ti-timer"></i>
                            تم النشر بتاريخ:
                            {{$question->created}}
                        </span>

                    </div>
                </div>
            </div>

            <div class="">
                <div class="problem-description">
                    <p>
                        {{$question->desc}}
                    </p>
                    <img @if($question->img) src="{{URL ($question->img)}}" @endif>
                </div>
            </div>

            <!-- START LEAVE COMMET-->
            @if(Auth::id() && $question->status=='open')
            <div class="row">
                <div class="col-sm-12">
                    <div class="widget-area no-padding blank leave-comment">
                        <div class="status-upload">
                            <form class="postcomment" action="" method="post">
                                {{ csrf_field() }}
                                <textarea placeholder="اترك تعليقك " name="comment" ></textarea>
                                <input type="hidden" name="question_id" value="{{$question->id}}" placeholder="{{$question->id}}">
                                <input type="hidden" name="parent_id" value="0" placeholder="">
                                <button type="submit"  class="btn btn-success">
                                    <i class="fa fa-share"></i>
                                    اترك تعليقك
                                </button>
                            </form>
                        </div><!-- Status Upload  -->
                    </div><!-- Widget Area -->
                </div>
            </div>
            @endif
            <!-- /END LEAVE COMMET-->

            <!--START QUESTIONS COMMENTS-->
            <div class="comments-container">
                <ul id="comments-list" class="comments-list">
                    @if($question->comments)
                    @foreach($question->comments->reverse() as $comment)
                    @if(count($comment->reply()))
                    <li>
                        <div class="comment-main-level">
                            <div class="comment-avatar">
                                @if($comment->users->group_id == '2' )
                                <a href="{{ url('/company') }}/{{ $comment->users->id }}">
                                    <img @if($comment->users->img) src="{{ url($comment->users->img)}}"@endif  alt="{{$comment->users->name}}">
                                </a>
                                @endif
                                @if($comment->users->group_id == '1' )
                                <a href="{{ url('/userProfile') }}/{{ $comment->users->id }}">
                                    <img @if($comment->users->img) src="{{ url($comment->users->img)}}"@endif  alt="{{$comment->users->name}}">
                                </a>
                                @endif

                            </div>



                            <div class="comment-box">
                                <div class="comment-head">

                                    @if($comment->users->group_id == '2' )
                                    <h6 class="comment-name by-author"><a href="{{ url('/company') }}/{{ $comment->users->id }}">{{$comment->users->name}}</a></h6>
                                    @endif
                                     @if($comment->users->group_id == '1' )
                                    <h6 class="comment-name by-author"><a href="{{ url('/userProfile') }}/{{ $comment->users->id }}">{{$comment->users->name}}</a></h6>
                                    @endif


                                    <div class="replay-desc">
                                         <span><i class="ti-timer"></i>  {{$comment->created}}</span>
                                        @if(Auth::id() == $comment->user_id )
                                        <a href="{{url('/comment/delete')}}/{{$comment->id}}" class=""><i class="ti-trash"></i></a>
                                        @endif
                                        @if($question->user_id==Auth::id() && $question->status=='open'  && $comment->users->group_id=='2')
                                        <input type="hidden" value="{{$comment->users->group_id}}">
                                        <form  method="post" action="" class="mail">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="company_id" value="{{$comment->user_id}}">
                                             <input type="hidden" name="question_id" value="{{$question->id}}" >
                                            <input type="hidden" name="stars" value="0">
                                            <input type="hidden" name="review" value=" ">
                                            <input type="hidden" name="status" value="0">
                                            <input type="hidden" value="">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-handshake-o"></i> دعوة للتواصل</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="comment-content">
                                    {{$comment->comment}}
                                    <!-- Like -->
                                    @if(auth()->user())
                                    <div class="post post-like" id="{{$comment->id}}">
                                      <input type="hidden" value="{{csrf_token()}}">
                                        <i class="fa fa-heart lik-comment @if($comment->like_or_not() && $comment->like_or_not()->comment_id == $comment->id) like-red @endif"></i>
                                        <span>{{$comment->likes}}</span>

                                    </div>
                                    @endif
                                    <!-- Like -->
                                </div>
                            </div>
                        </div>
                        <!--START REPLIES-->
                        <ul class="comments-list reply-list">
                            @foreach($comment->reply() as $reply)
                            <li>
                                <div class="comment-avatar">
                                    @if($reply->users->group_id == '2' )

                                    <a href="{{ url('/company') }}/{{ $reply->users->id }}">
                                        <img @if($reply->users->img) src="{{ url($reply->users->img)}}"@endif  alt="{{$reply->users->name}}">
                                    </a>
                                    @endif
                                    @if($reply->users->group_id == '1' )

                                    <a href="{{ url('/userProfile') }}/{{ $reply->users->id }}">
                                        <img @if($reply->users->img) src="{{ url($reply->users->img)}}"@endif  alt="{{$reply->users->name}}">
                                    </a>
                                    @endif
                                </div>
                                <div class="comment-box">

                                    <div class="comment-head">
                                    @if($reply->users->group_id == '2' )
                                    <h6 class="comment-name by-author"><a href="{{ url('/company') }}/{{ $reply->users->id }}">{{$reply->users->name}}</a></h6>
                                    @endif
                                    @if($reply->users->group_id == '1' )
                                    <h6 class="comment-name by-author"><a href="{{ url('/userProfile') }}/{{ $reply->users->id }}">{{$reply->users->name}}</a></h6>
                                    @endif

                                    <div class="replay-desc">
                                          <span><i class="ti-timer"></i>  {{$reply->created}}</span>
                                     @if(Auth::id() == $reply->user_id )
                                        <a href="{{url('/comment/delete')}}/{{$reply->id}}" class=""><i class="ti-trash"></i></a>
                                        @endif
                                    </div>

                                    </div>
                                    <div class="comment-content">
                                        {{$reply->comment}}
                                    </div>
                                    <!-- Like -->
                                    @if(auth()->user())
                                    <div class="post post-like" id="{{$reply->id}}">
                                        <input type="hidden" value="{{csrf_token()}}">
                                        <i class="fa fa-heart lik-comment @if($reply->like_or_not() && $reply->like_or_not()->comment_id == $reply->id) like-red @endif"></i>
                                        {{--@if($reply->first()->liked->first()->comment_id == $reply->id && $reply->first()->liked->first()->user_id == Auth::id()) {{like-red}} @endif--}}
                                        <span>{{$reply->likes}}</span>
                                    </div>
                                    @endif
                                    <!-- Like -->
                                </div>
                            </li>
                            @endforeach

                            @if(Auth::id() && $question->status=='open')
                            <li class="auther-leave-comment">
                                <div class="comment-avatar">
                                    <img @if(Auth::user()->img) src="{{ url(Auth::user()->img) }}" @endif alt="{{Auth::user()->name }}">
                                </div>
                                <div class="comment-box">
                                    <div class="comment-head {{$comment->id}}">
                                        <form class="postcomment" action="" method="post">
                                            {{ csrf_field() }}
                                            <textarea rows="4" cols="50" name="comment" ></textarea>

                                            <input type="hidden" name="parent_id" value="{{$comment->id}}" placeholder="{{$comment->id}}">

                                            <input type="hidden" name="question_id" value="{{$question->id}}" placeholder="{{$question->id}}">

                                            <button type="submit" class="btn btn-success">
                                                <i class="ti-thought"></i>
                                                اكتب تعليق
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </li>
                            @endif
                        </ul>
                        <!-- /END REPLIES-->
                    </li>
                    @else
                    <li>
                        <div class="comment-main-level">
                            <div class="comment-avatar">
                                @if($comment->users->group_id == '2' )
                                <a href="{{ url('/company') }}/{{ $comment->users->id }}">
                                    <img @if($comment->users->img) src="{{ url($comment->users->img)}}"@endif  alt="{{$comment->users->name}}">
                                </a>
                                @endif
                                @if($comment->users->group_id == '1' )
                                <a href="{{ url('/userProfile') }}/{{ $comment->users->id }}">
                                    <img @if($comment->users->img) src="{{ url($comment->users->img)}}"@endif  alt="{{$comment->users->name}}">
                                </a>
                                @endif
                            </div>
                            <div class="comment-box">
                                <div class="comment-head">
                                     @if($comment->users->group_id == '2' )
                                    <h6 class="comment-name by-author"><a href="{{ url('/company') }}/{{ $comment->users->id }}">{{$comment->users->name}}</a></h6>
                                    @endif
                                    @if($comment->users->group_id == '1' )
                                    <h6 class="comment-name by-author"><a href="{{ url('/userProfile') }}/{{ $comment->users->id }}">{{$comment->users->name}}</a></h6>
                                    @endif


                                    <div class="replay-desc">
                                        <span><i class="ti-timer"></i>  {{$comment->created}}</span>
                                         @if(Auth::id() == $comment->user_id )
                                        <a href="{{url('/comment/delete')}}/{{$comment->id}}" class=""><i class="ti-trash"></i></a>
                                        @endif
                                        @if($question->user_id==Auth::id() && $question->status=='open' && $comment->users->group_id=='2')

                                        <!-- user_id`, `company_id`, `stars`, `review`, `status` -->
                                        <form  method="post" action="" class="mail">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="company_id" value="{{$comment->user_id}}" >
                                             <input type="hidden" name="question_id" value="{{$question->id}}" >
                                         <!--    <input type="hidden" name="stars" value="0">
                                            <input type="hidden" name="review" value=" ">
                                            <input type="hidden" name="status" value="0"> -->
                                            <input type="hidden" value="">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-handshake-o"></i>  دعوة للتواصل</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <div class="comment-content">
                                    {{$comment->comment}}
                                </div>
                                <!-- Like -->
                                @if(auth()->user())
                                <div class="post post-like" id="{{$comment->id}}">
                                  <input type="hidden" value="{{csrf_token()}}">
                                    <i class="fa fa-heart lik-comment @if($comment->like_or_not() && $comment->like_or_not()->comment_id == $comment->id) like-red @endif"></i>
                                    {{--@if($comment->first()->liked->first()->comment_id == $comment->id && $comment->first()->liked->first()->user_id == Auth::id()) like-red @endif--}}
                                    <span>{{$comment->likes}}</span>
                                </div>
                                @endif
                                <!-- Like -->
                            </div>
                        </div>
                        <!--START REPLIES-->
                        <ul class="comments-list reply-list">
                             @if(Auth::id() && $question->status=='open')
                            <li class="auther-leave-comment">
                                <div class="comment-avatar">
                                    <img @if(Auth::user()->img) src="{{ url(Auth::user()->img) }}" @endif alt="{{Auth::user()->name }}">
                                </div>
                                <div class="comment-box">
                                    <div class="comment-head {{$comment->id}}">
                                        <form class="postcomment" action="" method="post">
                                            {{ csrf_field() }}
                                            <textarea rows="4" cols="50" name="comment" ></textarea>

                                            <input type="hidden" name="parent_id" value="{{$comment->id}}" placeholder="{{$comment->id}}">

                                            <input type="hidden" name="question_id" value="{{$question->id}}" placeholder="{{$question->id}}">

                                            <button type="submit" class="btn btn-success">
                                                <i class="ti-thought"></i>
                                                اكتب تعليق
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </li>
                            @endif
                        </ul>
                        <!-- /END REPLIES-->
                    </li>
                    @endif
                    @endforeach
                    @endif
                </ul>
            </div>
            <!--/END QUESTIONS COMMENTS-->
        </div>
        <!-- /END RIGHT SIDE  -->

        <!-- START LEFT SIDE -->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="anouncment-sidebar">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!-- wza2ef --><ins class="adsbygoogle"    style="display:block"    data-ad-client="ca-pub-2178725799240442"    data-ad-slot="4745084170"    data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
            </div>
            <div class="most-rated-comp">
                <h2>
                    اسالة ذات صلة تم حلها
                </h2>
                @foreach($results as $result)
                <div class="related-questions-block">
                    <a href="{{ URL('question') }}/{{ $result->id}}" class="related-question">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        {{ $result->title }}
                    </a>
                </div>
                @endforeach
            </div>
            <div class="most-rated-comp">
                <h2>
                    <i class="ti-cup">
                    </i>
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
        <!-- /END LEFT SIDE  -->
    </div>
</div>
<div class="sucess-contact">
    <div class="sub-sucess-contact">
        <p>تم ارسال دعوتك بنجاح</p>
        <p> لضمان حقوقك كن على اتصال بالشركة من خلال رسائل الموقع الخاصة</p>
        <img src="{{ asset('images/success.png') }}">
        <br>
        <button class="close-message btn btn-success">حسناً</button>
    </div>
</div>

<div class="accepted-comment">
  <p>تم عمل اعجبني .</p>
</div>
<div class="loading-message">
    <img class="loading-contacts" src="{{ asset('images/loading.gif') }}">
</div>

<div class="rejected-comment">
    <div class="sub-sucess-contact">
        <p>تم الاعجاب من قبل</p>
        <img class="fail-img" src="{{ asset('images/fail.png') }}">
        <br>
        <button class="close-message btn btn-success">حسناً</button>
    </div>
</div>

<!--START EDIT Question-->
<div class="modal fade" id="edit_question">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">تعديل:  {{$question->title}}</h4>
            </div>
            <form class="form-horizontal" method="post" action="{{url('/question/edit')}}/{{$question->id}}"  enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="field-1"> عنوان السؤال </label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="عنوان السؤال" name="title" value="{{ $question->title }}">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="field-1"> وصف السؤال </label>
                            <div class="col-sm-9">
                                <textarea class="form-control content-page" placeholder="وصف السؤال" name="desc">{{ $question->desc }}</textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="field-1"> الصورة </label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="img" value="{{ $question->img }}">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check-circle"></i> حفظ</button>
                    <a href="javascript:;" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END EDIT PAGE CONTENT-->
<!-- /main container -->

@endsection

@section("scripts")
<script>
    $('document').ready(function(){

      //LIKE comment Ahmed Magdy
      $('.lik-comment').on('click', function (e) {
              var like = $(this);
              var comment_id = $(this).parents('div').attr('id');
              var csrf= $(this).parent('div').find('input').val();
              var span= parseInt($(this).parent('div').find('span').html());
              console.log(span);
              //loading gif
              //  $( ".loading-message" ).show();
              $.ajax({
                      url:"{{url('/like')}}",
                      data: {
                        "comment_id" : comment_id,
                      },
                      type: "post",
                      headers: {
                          'X-CSRF-TOKEN': csrf
                      },
                      success: function(response) {
                        like.addClass('like-red');
                        span = span + 1;
                        like.parent().find('span').html(span);
                    },
                    error: function (response) {
                        $( ".rejected-comment").show();
                    }
        });
      });
      //End LIKE comment Ahmed Magdy


      $(".heart").on('click',function(event){
          event.preventDefault();
          $(this).toggleClass("animated");
      });

    $(".rep").on("click", function(event){
    event.preventDefault();
    var comment = $(this).find("span").attr("class");
    console.log(comment);
    $(".replay").find("." + comment).parent("div").toggle();
    });
    $('.postcomment').on('submit', function(event){

    event.preventDefault();
    // console.log($(this).find(".h").val());

    $.ajax({
    // url:'{{$question->id}}',
     data: $(this).serialize(),
            type: 'POST',
            success: function(response) {

            window.location.reload();
            }

    });
    });
    $('.mail').on("submit", function(event){
    event.preventDefault();
    //loading gif
     $( ".loading-message" ).show();
    $.ajax({
    url:  {{$question->user_id}} + '/mail',
            data: $(this).serialize(),
            type: "post",
            success: function(response) {
            console.log(response);
//                alert("message send to company successfully")
//
//hide loading gif
            $( ".loading-message" ).hide();
              $( ".sucess-contact" ).show();
            }

    });
    });
    });



    $(function() {
    $('#icr-1').click(function(event) {
    event.preventDefault();
    var checked = $('.check').val();
    var csrf = $("#hidden").val();
    console.log(checked);
    $.ajax({
    method: "post",
            url:{{ $question->id }} + '/done',
            data: {
            "status": checked,
                    "_token": csrf
            },
            success: function(response) {
            window.location.reload();
            }
    });
    });
    });

    $('.close-message').on('click', function (e) {
        $('.sucess-contact').hide();
        $('.rejected-comment').hide();
    });



</script>
@endsection
