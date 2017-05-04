@extends('layouts.app')
<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
@section('content')

<div class="container headerOffset">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 registration">
            <div class="panel panel-default">
                <div class="panel-heading"> <i class="ti-user"></i> تسجيل مستخدم جديد</div>
                <div class="panel-body">
                
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="register-option">
                            <div class="col-md-6 controls regular-user active">
                                <div class="sub-controls">
                                    <input type="radio" id="option1"  value="1" name="group" @if(old('group')!=2) checked @endif>  التسجيل كمستخدم عادي
                                </div>
                            </div>
                            <div class="col-md-6 controls company-user">
                                <div class="sub-controls">
                                    <input type="radio" id="option2"  value="2" name="group" @if(old('group')==2) checked @endif>  التسجيل كصاحب شركة
                                </div>
                            </div>
                        </div>

                        <!-- user name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">اسم المستخدم</label>

                            <div class="col-md-8 controls">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
                                    <input id="name" required type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>
                                </div>
                                <div>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- user email -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">البريد الاليكترونى</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- insert user phone -->

                        <div class="user-phone form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">التليفون</label>


                            <div class=" controls">
                                <div class="col-md-8">

                                    <div class="input-group">

                                        <span class="input-group-addon">
                                            <i class="fa fa-phone fa-lg" aria-hidden="true"></i></span>

                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"  autofocus>

                                    </div>
                                    <div>
                                        @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- enter password -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">كلمه المرور</label>

                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lg fa-lock " aria-hidden="true"></i>
                                    </span>

                                    <input id="password" type="password" class="form-control"
                                           name="password" required autofocus>
                                </div>
                                <div>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- end password -->
                        <!-- start confirm password -->
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">تاكيد كلمه المرور</label>
                            <div class=" controls">
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                                        </span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- location is here  -->
                        <div class="form-group">
                            <label  class="col-md-4 control-label">اختار المحافظه</label>
                            <div class="col-md-8">
                                <select class="selectpicker form-control" name="city">
                                    <option value="القاهره" selected>القاهره</option>
                                    <option value="الجيزه">الجيزه</option>
                                    <option value="الشرقيه">الشرقيه</option>
                                    <option value="الاسكندريه">الاسكندريه</option>
                                    <option value="دمياط">دمياط</option>
                                    <option value="الغربيه">الغربيه</option>
                                    <option value="المنوفيه">المنوفيه</option>
                                    <option value="مطروح">مطروح</option>
                                    <option value="كفرالشيخ">كفرالشيخ</option>
                                    <option value="المنيا">المنيا</option>
                                    <option value="اسيوط">اسيوط</option>
                                    <option value="قنا">قنا</option>
                                    <option value="سوهاج">سوهاج</option>
                                </select>
                            </div>
                        </div>

                        <!-- end location -->



                        <div class="form-group{{ $errors->has('profilephoto') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">الصوره الشخصيه</label>

                            <div class="col-md-8">
                                <div class="controls">
                                    <input  type="file"   name="profilephoto" class="input-file form-control" >


                                    @if ($errors->has('profilephoto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profilephoto') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

 
                         <!-- google reckapcha usage-->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-8">

                                {!! Recaptcha::render(['lang' => 'ar']) !!}

                                @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <!-- end google reckapcha usage-->
 
                        <!-- user group -->

                        <!--                        <div class="form-group">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-8">
                                                        <select class="selectpicker form-control" name="group"  id="option" >
                                                            <option class=""   id="option1"  value="1" selected>مستخدم عادي</option>
                                                            <option class=""   id="option2" value="2">صاحب شركه</option>
                                                        </select>
                                                    </div>
                                                </div >-->

                        <!-- register button  -->

                        <div class="form-group now" >
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل
                                </button>
                            </div>
                        </div>


                    </form> <!-- end of form  -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
