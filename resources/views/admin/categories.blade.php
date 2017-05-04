@extends('layouts.admin')
@section('content')
<ol class="breadcrumb pull-right">
    <li><a href="{{ url('/ad/categories') }}">Home</a></li>
    <li class="active">Categories</li>
</ol>
<h1 class="page-header">Categories</h1>
<div class="section-container section-with-top-border">

    <a href="#add_page" data-toggle="modal" class="btn btn-primary btn-rounded add-new-record"><i class="fa fa-plus-square"></i>  Add</a>

    <div class="panel pagination-inverse m-b-0 clearfix">
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
        <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
            <thead>
                <tr class="inverse">
                    <th> Title</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <!--START GET ALL DATA-->
                @if(isset($cats))
                @foreach($cats as $cat)
                <tr class="gradeA">
                    <td>{{ $cat->title }}</td>
                    <td>
                        <a href="#edit_page_{{ $cat->id }}" data-toggle="modal" class="btn btn-lime btn-rounded">
                            <i class="fa fa-pencil"></i>
                            Edit
                        </a>
                        <a href="{{url('/ad/cat/delete')}}/{{$cat->id}}" class="btn btn-danger btn-rounded">
                            <i class="fa fa-trash"></i>
                            Delete
                        </a>
                    </td>


            <!--START EDIT PAGE CONTENT-->
            <div class="modal fade" id="edit_page_{{ $cat->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Edit Page "{{ $cat->title }}"</h4>
                        </div>
                        <form class="form-horizontal" method="post" action="{{url('/ad/cat')}}/{{$cat->id}}"> 
                            <div class="modal-body">
                                <div class="panel-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="field-1"> Title <span class="required">*</span></label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Category Title" name="title" value="{{ $cat->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group-separator"></div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lime" name="submit"><i class="fa fa-check-circle"></i> Save</button>
                                <a href="javascript:;" class="btn width-100 btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END EDIT PAGE CONTENT-->
            </tr>
            @endforeach
            @endif
            <!--/END GET ALL DATA-->
            </tbody>
        </table>
    </div>
</div>

<!--START ADD MODAL-->
<div class="modal fade" id="add_page">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add New Category</h4>
            </div>

            <form class="form-horizontal" method="post" action="{{url('/ad/cat/add')}}"> 
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="field-1"> Title <span class="required">*</span></label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Category Title" name="title">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-lime" name="submit"><i class="fa fa-check-circle"></i> Save</button>
                    <a href="javascript:;" class="btn width-100 btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--END EDIT MODAL-->

@endsection