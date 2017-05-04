@extends('layouts.app')
@section('content')

<div class="container main-container headerOffset">
    @if(isset($users))
    <div class="row">
        @if(auth()->user() && auth()->user()->id != $users->id)
        <div class="col-lg-12 col-sm-12" style="text-align: center;">
            <a href="{{url('/pm')}}/{{$users->id}}" class="btn message-me hvr-icon-pulse"> راسلني الآن</a>
        </div>
        @endif
        <div class="col-lg-12 col-sm-12">
            <div class="card hovercard">
                <div class="card-overlay"></div>
                <div class="card-background">
                    <img class="card-bkimg img-responsive" alt="{{ $users->name }}" src="
                         @if($users->cover)
                         {{URL ($users->cover)}}
                         @endif
                         ">
                </div>
                <div class="useravatar">
                    <img alt="{{ $users->name }}" src="
                         @if( $users->img)
                         {{URL ($users->img)}}
                         @endif
                         " />
                </div>
                <div class="card-info"> <span class="card-title">{{ $users->name }}</span> </div>
                @if(Auth::id()== $users->id)
                <button type="button" class="btn btn-primary edit-profile" data-toggle="modal" data-target="#myModal">
                    <i class="ti-pencil-alt"></i>
                    تعديل الملف الشخصي
                </button>
                @endif
            </div>
        </div>
        <div class="col-sm-12">
            <div class="user-details">
                <div class="company-details-block"> <i class="ti-location-pin" aria-hidden="true"></i> {{$users->city}}</div>
            </div>
        </div>
    </div>

    @if(Auth::id())
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    </div>
    @endif

        <div class="col-m-12">
            @if(isset($users->questions))
            @foreach ($users->questions as $question)
            <div class="question-block">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="row">
                            <span class="data-icons col-sm-4">
                                {{ $question->visited }}
                                <i class="fa fa-eye"></i>
                            </span>
                            <span class="data-icons col-sm-4">
                                @if (isset($question->allComments))
                                {{ $question->allComments->count()}}
                                @endif
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
                                <h2 class="question-title-block"><a href="{{ url('/question') }}/{{$question->id}}">{{ $question->title }}</a></h2>
                            </div>
                            <div class="col-sm-12">
                                <a href="{{ url('/questions') }}" class="qustion-user">
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



            @endforeach
            @endif
        </div>

    @endif
    <form action="{{url('userProfile')}}/{{Auth::id()}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i class="ti-pencil-alt"></i> تعديل الملف الشخصي  </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">اﻻسم</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$users->name}}" />
                            <input type="hidden" id="hidden" value="{{ csrf_token() }}">
                        </div>
                        <div class="form-group">
                            <label for="name">المحافظة</label>
                            <select name="city" class="form-control" id="city">
                                <option value="1">اﻻسكندرية</option>
                                <option value="2">القاهرة</option>
                                <option value="3">اﻻسماعيلية</option>
                                <option value="4">طنطا</option>
                                <option value="5">سوهاج</option>
                                <option value="6">أسيوط</option>
                                <option value="7">مطروح</option>
                                <option value="8">شرم الشيخ</option>
                                <option value="9">القليوبية</option>
                                <option value="10">المنيا</option>
                                <option value="11">السويس</option>
                                <option value="12">شمال سيناء</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">البريد اﻻلكترونى</label>
                            <input type="email" disabled class="form-control" id="email" value="{{$users->email}}">
                        </div>

                        <div class="form-group">
                            <label for="name">الهاتف</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$users->phone}}">
                        </div>
                        <div class="form-group profile-imge-edit">
                            <label for="name">الصورة الشخصية</label>
                            <input type="file" class="form-control" id="img" name="img" value="{{ asset($users->img )}}">
                            <p class="help-block">يمكنك تغيير صورتك الشخصية من هنا</p>
                        </div>

                        <div class="form-group profile-imge-edit">
                            <label for="name">صورة الحائط</label>
                            <input type="file" class="form-control" id="cover" name="cover" value="{{ $users->cover }}">
                            <p class="help-block">يمكنك تغيير صورتك الحائط من هنا</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="ti-na"></i> الغاء</button>
                        <button type="submit" class="btn btn-primary" id="form"> <i class="ti-check"></i> حفظ التغيرات</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end edit modal-->
     
</div>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection
@section('scripts')
    <!--<script>
           $("#form").on("click", function(event){

            event.preventDefault();
            var csrf= $("#hidden").val();
            var name=$('#name').val();
            var city=$('#city :selected').text();
            var email=$('#email').val();
            var phone=$('#phone').val();
            var img=$('#img').val();
            var cover=$('#cover').val();
               $.ajax({
                // url:"updateUser",
                 method: "post",
                 data:{
                 'name':name,
                  'city':city,
                  'email':email,
                  'phone':phone,
                  'img':img,
                  'cover':cover,
                "_token" : csrf
                },
                 success: function(response) {
                   console.log(response);
                  window.location.reload();
                    $("#myModal").modal("hide");
                 }

               });
           });

</script>-->
@endsection