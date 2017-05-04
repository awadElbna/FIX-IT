@extends('layouts.admin')
@section('content')
<ol class="breadcrumb pull-right">
    <li><a href="{{ url('/ad/dashboard') }}">Home</a></li>
    <li class="active">Settings</li>
</ol>
<h1 class="page-header">Settings</h1>
<div class="section-container section-with-top-border p-b-5">
    <div class="row">
        @if(isset($settings))
        @foreach($settings as $setting)
        <div class="col-md-12">
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
            <form class="form-horizontal" method="post" action="{{url('/ad/setting')}}/{{$setting->id}}">
                {{ csrf_field() }}
                <div class="panel">
                    <ul class="nav nav-tabs nav-tabs-primary nav-justified">
                        <li class="active">
                            <a href="#setting" data-toggle="tab">
                                <span><i class="fa fa-cogs"></i></span>
                                <span class="hidden-xs">Setting</span>
                            </a>
                        </li>
                        <li>
                            <a href="#seo" data-toggle="tab">
                                <span><i class="fa fa-line-chart"></i></span>
                                <span class="hidden-xs">SEO</span>
                            </a>
                        </li>
                        <li>
                            <a href="#contactinfo" data-toggle="tab">
                                <span><i class="fa fa-envelope-o"></i></span>
                                <span class="hidden-xs">Contact Info</span>
                            </a>
                        </li>
                        <li>
                            <a href="#social-media" data-toggle="tab">
                                <span><i class="fa fa-share-alt"></i></span>
                                <span class="hidden-xs">Social Media Acc.</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content m-b-0" style="float: left; width: 100%;">
                        <div class="tab-pane fade active in" id="setting">
                            <div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $setting->title }}" name="title">
                                    </div>
                                </div>
                                <div class="form-group-separator"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Copyright</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $setting->copyrights }}" name="copyrights">
                                    </div>
                                </div>
                                <div class="form-group-separator"></div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="seo">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta Keywords</label>
                                <div class="compose-message-editor col-sm-10">
                                    <textarea style="height: 100px;" class="form-control" name="meta_keywords">{{$setting->meta_keywords}}</textarea>
                                </div>
                            </div>
                            <div class="form-group-separator"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Meta Description</label>
                                <div class="compose-message-editor col-sm-10">
                                    <textarea style="height: 150px;" class="form-control" name="meta_description">{{$setting->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group-separator"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Google Announcements</label>
                                <div class="compose-message-editor col-sm-10">
                                    <textarea style="height: 150px;" class="form-control" name="google_ann">{{$setting->google_ann}}</textarea>
                                </div>
                            </div>
                            <div class="form-group-separator"></div>
                        </div>

                        <div class="tab-pane fade" id="contactinfo">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Webmaster Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="webmaster_email" value="{{$setting->webmaster_email}}">
                                </div>
                            </div>
                            <div class="form-group-separator"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Support Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="support_email" value="{{$setting->support_email}}">
                                </div>
                            </div>
                            <div class="form-group-separator"></div>



                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-1"> Phone</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="phone" value="{{$setting->phone}}">
                                </div>
                            </div>
                            <div class="form-group-separator"></div>

                        </div>
                        <div class="tab-pane fade" id="social-media">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-1"> Facebook Account</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="fb_account" value="{{$setting->fb_account}}">
                                </div>
                            </div>
                            <div class="form-group-separator"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-1"> Twitter Account</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="tw_account" value="{{$setting->tw_account}}">
                                </div>
                            </div>
                            <div class="form-group-separator"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-1"> Google Plus Account</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="gp_account" value="{{$setting->gp_account}}">
                                </div>
                            </div>
                            <div class="form-group-separator"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-1"> Youtube Account</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control"  name="yt_account" value="{{$setting->yt_account}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-lime" name="submit"><i class="fa fa-check-circle"></i> Submit</button>
                                <a href="" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection