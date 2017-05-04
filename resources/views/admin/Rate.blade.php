@extends('layouts.admin')
@section('content')

<ol class="breadcrumb pull-right">
    <li><a href="">Companies</a></li>
    <li class="active">Users</li>
</ol>
<h1 class="page-header">Companies</h1>
<div class="section-container section-with-top-border">

    <a href="" class="btn btn-primary btn-rounded add-new-record"><i class="fa fa-plus-square"></i>  Add</a>

    <div class="panel pagination-inverse m-b-0 clearfix">
        <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
            <thead>
                <tr class="inverse">
                    <th> ID</th>
                    <th> Username</th>
                    <th> Company Name</th>
                    <th> Stars</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($ratings as $rating)
                    <tr class="gradeA" id="{{$rating->id}}">
                        <td>{{$rating->id}}</td>
                        <td>{{$rating->user_rate->name}}</td>
                        <td>{{$rating->users->name}}</td>
                        <td>{{$rating->stars}}</td>
                        <td>{{$rating->status}}</td>
                        <td>
                            <a class="btn btn-info"  data-toggle="modal" data-target="#{{$rating->id}}">
                                <i class="fa fa-info-circle"></i>
                            </a>
                            <a href="{{url('ad/rate/delete')}}/{{$rating->id}}" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
    <!---------- Modal ---------->
    <form accept-charset="UTF-8" action="" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="{{$rating->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Company Ifno</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Review</label>
                            <textarea rows="4" cols="50" disabled>{{$rating->review}}</textarea>
                            {{ csrf_field() }}
                        </div>
                        <div class="form-group">
                            <label for="name">Created</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$rating->created_at}}" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="ti-na"></i>Exit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach

            </tbody>
        </table>

    </div>
</div>
{{$ratings->links()}}
@endsection
