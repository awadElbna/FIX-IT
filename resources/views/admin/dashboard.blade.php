@extends('layouts.admin')
@section('content')
<ol class="breadcrumb pull-right">
    <li><a href="{{ url('/ad/dashboard') }}">Home</a></li>
    <li class="active">Dashboard</li>
</ol>
<h1 class="page-header">Dashboard</h1>
<div class="section-container section-with-top-border p-b-5">
    <div class="row">
        <div class="col-md-3">
            <div class="widget widget-stat bg-inverse text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-users"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Customers</div>
                    <div class="widget-stat-number">{{$customers}}</div>
                    <div class="widget-stat-text">All Customers</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-stat bg-success text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-address-card-o"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Companies</div>
                    <div class="widget-stat-number">{{$companies}}</div>
                    <div class="widget-stat-text">All Companies</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-stat bg-grey-light text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-user-secret"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Administrators</div>
                    <div class="widget-stat-number">{{$admins}}</div>
                    <div class="widget-stat-text">All Administrators</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-stat bg-primary text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-sitemap"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Categories</div>
                    <div class="widget-stat-number">{{$categories}}</div>
                    <div class="widget-stat-text">All Categories</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-stat bg-info text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-question-circle"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Questions</div>
                    <div class="widget-stat-number">{{$questions}}</div>
                    <div class="widget-stat-text">All Questions</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="widget widget-stat bg-danger text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-info-circle"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Faqs</div>
                    <div class="widget-stat-number">{{$faqs}}</div>
                    <div class="widget-stat-text">All Faqs</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget widget-stat bg-primary text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-handshake-o"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Contacts</div>
                    <div class="widget-stat-number">{{$contacts}}</div>
                    <div class="widget-stat-text">All Contacts</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="widget widget-stat bg-purple text-white">
                <div class="widget-stat-btn"><a href="#" data-click="widget-reload"><i class="fa fa-repeat"></i></a></div>
                <div class="widget-stat-icon"><i class="fa fa-file-text-o"></i></div>
                <div class="widget-stat-info">
                    <div class="widget-stat-title">Pages</div>
                    <div class="widget-stat-number">{{$pages}}</div>
                    <div class="widget-stat-text">All Pages</div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin/js/page-widgets.demo.js')}}"></script>
@endsection