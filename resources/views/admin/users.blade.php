@extends('layouts.admin')
@section('content')
<ol class="breadcrumb pull-right">
    <li><a href="#">Home</a></li>
    <li class="active">Users</li>
</ol>
<h1 class="page-header">Users</h1>

<div class="section-container section-with-top-border">
    <a href="" class="btn btn-primary btn-rounded add-new-record"><i class="fa fa-plus-square"></i>Add</a>
    <div class="panel pagination-inverse m-b-0 clearfix">
        <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
            <thead>
                <tr class="inverse">
                    <th>ID</th>
                    <th> UserName</th>
                    <th>email</th>
                    <th> Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)


                <tr class="gradeA" @if($user->trashed()) style="background-color:#ff8080" @endif>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>

                    <td>
                        <a href="#{{$user->id}}" data-toggle="modal"class="btn btn-lime btn-rounded">
                            <i class="fa fa-pencil"></i>
                            Show
                        </a>
                        <div class="modal fade" id="{{$user->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title"> {{ $user->name }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p  style="color:#FF00FF;"><b style="color:#20B2AA;">User ID :</b> {{ $user->id }}</p>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:#FF00FF;"><b style="color:#20B2AA;">User Nmae :</b>{{ $user->name }}</p>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:#FF00FF;"><b style="color:#20B2AA;">User Email :</b>{{ $user->email }}</p>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:#FF00FF;"><b style="color:#20B2AA;">User City :</b>{{ $user->city }}</p>
                                    </div>
                                    <div class="modal-body">
                                        <b style="color:#20B2AA;">User Avatar :</b>
                                        <img style="width:100%" alt="{{ $user->name }}" src=" @if($user->img)  {{URL ($user->img)}}  @endif  " />
                                    </div>
                                    <div class="modal-body">
                                        <b style="color:#20B2AA;">User Profile image :</b>
                                        <img style="width:100%" alt="{{ $user->name }}" src=" @if($user->cover)  {{URL ($user->cover)}}  @endif  " />

                                    </div>
                                    <div class="modal-body">
                                        <p style="color:#FF00FF;"><b style="color:#20B2AA;" >User Phone :</b>{{ $user->phone }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" class="btn width-100 btn-danger" data-dismiss="modal">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url ('ad/users')}}/{{$user->id}}" class="btn btn-danger btn-rounded">
                            <i class="fa fa-trash"></i>
                            Delete
                        </a>
                        <a href="{{url ('ad/users')}}/{{$user->id}}/d" class="btn btn-primary btn-rounded">
                            <i class="fa fa-window-restore"></i>
                            Restore
                        </a>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
