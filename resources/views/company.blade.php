@extends('layouts.app')

@section('content')
<div class="container main-container headerOffset">
    <div class="row">
        @if(auth()->user() && auth()->user()->id != $user->id)
        <div class="col-lg-12 col-sm-12" style="text-align: center;">
            <a href="{{url('/pm')}}/{{$user->id}}" class="btn message-me hvr-icon-pulse"> راسلني الآن</a>
        </div>
        @endif
        <div class="col-lg-12 col-sm-12">
            <div class="card hovercard">
                <div class="card-overlay"></div>
                <div class="card-background">
                    <img class="card-bkimg img-responsive" alt="cover" @if(isset($user->cover))
                         src="{{ url($user->cover)}}"
                         @endif
                         >
                </div>
                <div class="useravatar">
                    <img alt="profile photo" 
                         @if(isset($user->img))
                         src="{{ url($user->img)}}"
                         @endif
                         >
                </div>
                <div class="card-info"> <span class="card-title">{{ $user->name }}</span> </div>

                @if($user->id==Auth::id())
                <button type="button" class="btn btn-primary edit-profile" data-toggle="modal" data-target="#myModal">
                    <i class="ti-pencil-alt"></i>
                    تعديل الملف الشخصي
                </button>
                @endif
            </div>
        </div>
        <div class="company-details">
            <div class="col-sm-12  btn-group-justified btn-group-lg">
                @if(isset($user))
                @if($user->company->aprovment == 'waiting')
                <div class="btn-group" role="group">
                    <div class="btn waiting-approve">
                        <i class="fa fa-exclamation-triangle"></i> بانتظار الموافقه على الحساب 
                    </div>
                </div>
                @else
                <div class="btn-group" role="group">
                    <div  id="stars" class="btn" >
                        @for($i=0 ; $i<round($user->company->rating) ; $i++)
                            <i class="fa fa-star" aria-hidden="true"></i>
                            @endfor
                            @for($i=5; $i>round($user->company->rating) ; $i--)
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                            @endfor
                            <div >التقييم</div>
                    </div>
                </div>
                @endif




                <div class="btn-group" role="group">
                    <div  id="favorites" class="btn " ><i class="ti-location-pin" aria-hidden="true"></i>
                        <div >{{$user->city}}</div>
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <div id="following" class="btn" ><i class="ti-email" aria-hidden="true"></i>
                        @if($status || $user->id == Auth::id() )
                        <div class="">{{$user->email}}</div>
                        @else
                        <div class="blurry-text">لم يتم التواصل من قبل</div>
                        @endif
                    </div>
                </div>
                <div class="btn-group" role="group">
                    <div id="following" class="btn" ><i class="ti-headphone-alt" aria-hidden="true"></i>
                        @if($status || $user->id == Auth::id() )
                        <div >{{$user->phone}}</div>
                        @else
                        <div class="blurry-text">لم يتم التواصل من قبل</div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-12 col-sm-12">
                <p class="text-center comp_desc">{{$user->company->desc}}</p>
            </div>
        </div>
    </div>

    <div class="main row">
        <!-- Edit Profile Errors -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- End Edit Profile Errors -->
        <!-- user review  -->
        <div class="col-md-8 users-rating">    
            <div class="row ">
                <div class=" col-sm-12">
                    <h3> اراء العملاء </h3>
                </div>
            </div>

            <!--START YOUR UER ADD RATIG-->
            <div class="leave-comment-rating">
                <div class="error_review">
                    @if(Auth::id() && Auth::user()->group_id == 1)
                    <a class="btn btn-success" href="#reviews-anchor" id="open-review-box">اترك تعليقك </a>
                    @endif
                </div>
                <div class="col-md-12" id="post-review-box" style="display:none;">
                    <form accept-charset="UTF-8" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                        <input id="ratings-hidden" name="rating" type="hidden">

                        <textarea class="form-control animated" cols="200" id="new-review" name="comment" placeholder="برجاء ادخال تعليقك ها ..." rows="5"></textarea>

                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>

                            <button id="{{$user->id}}" class="btn btn-success save" type="submit">
                                <span><i class="ti-check"></i> حفظ</span>
                            </button>
                            <a class="btn btn-danger" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                <i class="ti-na"></i> إلغاء
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!--/END YOUR UER ADD RATIG-->

            @if(count($user_comments)>0)
            @foreach($user_comments as $user_comment)
            <div class="row">
                <div class="col-sm-2">
                    <div class="thumbnail">
                        <a href="{{ url('/userProfile') }}/{{ $user_comment->user_rate->id }}"><img class="img-responsive user-photo" src="{{ asset($user_comment->user_rate->img) }}"></a>
                    </div><!-- /thumbnail -->
                </div><!-- /col-sm-2 -->

                <div class="col-sm-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ url('/userProfile') }}/{{ $user_comment->user_rate->id }}">{{$user_comment->user_rate->name}}</a>

                            <div  id="stars" class="btn" >
                                @for($i=0 ; $i<round($user_comment->stars) ; $i++)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    @endfor
                                    @for($i=5; $i>round($user_comment->stars) ; $i--)
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    @endfor
                            </div>
                            <span class="text-muted" style="float: left; line-height: 34px; display: block;"><i class="ti-timer"></i>{{$user_comment->created_at->diffForHumans()}}</span>
                        </div>
                        <div class="panel-body">
                            {{$user_comment->review}}
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-10 -->
            </div><!-- /row -->
            @endforeach
            @else
            <div class="row">
                <p class="col-sm-12">لا يوجد تعليقات سابقة</p>
            </div>
            @endif
            <!-- leave review -->
        </div>
        <!-- end user review -->

        <!-- start google map  -->
        <div class="col-md-4">
            <h4><i class="ti-map-alt"></i> موقع الشركه</h4>
            <div class="">
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2648.833038448318!2d-89.2826271!3d48.402149400000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4d59202c99c9252f%3A0x4cb61e2f5a8d87e!2s218+Humber+Crescent%2C+Thunder+Bay%2C+ON+P7C+5X2!5e0!3m2!1sen!2sca!4v1424370904204"  width=100% height="450" frameborder="0" style="border:0"></iframe>
        </div>
    </div> <!-- end body -->
    <form accept-charset="UTF-8" action="{{ url('company/edit/profile')}}" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">تعديل الملف الشخصى</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">اﻻسم</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" />
                            {{ csrf_field() }}
                        </div>
                        <div class="form-group">
                            <label for="name">المحافظة</label>
                            <select name="city" class="form-control" id="city">
                                <option>اﻻسكندرية</option>
                                <option>القاهرة</option>
                                <option>اﻻسماعيلية</option>
                                <option>طنطا</option>
                                <option>سوهاج</option>
                                <option>أسيوط</option>
                                <option>مطروح</option>
                                <option>شرم الشيخ</option>
                                <option>القليوبية</option>
                                <option>المنيا</option>
                                <option>السويس</option>
                                <option>شمال سيناء</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">الهاتف</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="name">وصف الشركة</label>
                            <textarea rows="4" cols="50" class="form-control" id="desc" name="desc">{{$user->company->desc}}</textarea>

                        </div>
                        <div class="form-group profile-imge-edit">
                            <label for="name">الصورة الشخصية</label>
                            <input type="file" class="form-control" id="img" name="img" aria-describedby="fileHelp">

                            <p class="help-block">يمكنك تغيير صورتك الشخصية من هنا</p>
                        </div>

                        <div class="form-group profile-imge-edit">
                            <label for="name">صورة الحائط</label>
                            <input type="file" class="form-control" id="cover" name="cover" aria-describedby="fileHelp">
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

</div>  
<!-- end google map --> 
<!--end edit modal-->

@endsection

@section('company')
<script type="text/javascript">
    // $("#edit-profile").on("click", function(){
    //     event.preventDefault();
    //     console.log("a");
    // });
    // $("#form").on("click", function(event){  
    //         event.preventDefault();
    //         var csrf= $("#token").val();
    //         var id = $(".save").attr("id");
    //         var name=$('#name').val();
    //         var city=$('#city :selected').text();
    //         var email=$('#email').val();
    //         var phone=$('#phone').val();
    //         var img=$('#img');
    //         var cover=$('#cover');
    //         var formdata = new FormData();
    //         formdata.append('name', name); 
    //         formdata.append('id', id);
    //         formdata.append('city', city);
    //         formdata.append('email', email);
    //         formdata.append('phone', phone);
    //         var x,y;
    //         if(img[0].files[0]){x=img[0].files[0];}else{x=null;}
    //         formdata.append('img', x);
    //         if(img[0].files[0]){y=img[0].files[0];}else{ y=null;}
    //         formdata.append('cover', cover[0].files[0]?:null);
    //         $.ajax({
    //              url: "edit/Profile",
    //              method: "post",
    //              data:formdata,
    //              headers: {
    //                 'X-CSRF-TOKEN': csrf
    //             },
    //             processData: false,
    //             contentType: false,
    //              success: function(response) {
    //                console.log(response);
    //               window.location.reload();
    //                 $("#myModal").modal("hide");
    //              }
    //         });
    //     });
</script>
@endsection
