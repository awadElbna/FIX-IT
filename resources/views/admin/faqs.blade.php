@extends('layouts.admin')
@section('content')
<ol class="breadcrumb pull-right">
    <li><a href="{{ url('/ad/dashboard') }}">Home</a></li>
    <li class="active">Faqs</li>
</ol>
<h1 class="page-header">Faqs</h1>
<div class="section-container section-with-top-border">

    <a href="#add_faq" data-toggle="modal" class="btn btn-primary btn-rounded add-new-record"><i class="fa fa-plus-square"></i>  Add</a>



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
                    <th> Question</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <!--START GET ALL DATA-->
                @if(isset($faqs))
                @foreach($faqs as $faq)
                <tr class="gradeA">
                    <td>{{ $faq->question }}</td>
                    <td>
                        <a href="#show_faq_{{ $faq->id }}" data-toggle="modal" class="btn btn-success btn-rounded">
                            <i class="fa fa-eye"></i>
                            Show
                        </a>
                        <a href="#edit_faq_{{ $faq->id }}" data-toggle="modal" class="btn btn-lime btn-rounded">
                            <i class="fa fa-pencil"></i>
                            Edit
                        </a>
                        <a href="{{url('/ad/faq/delete')}}/{{$faq->id}}" class="btn btn-danger btn-rounded">
                            <i class="fa fa-trash"></i>
                            Delete
                        </a>
                    </td>

                    <!--START SHOW PAGE CONTENT-->
            <div class="modal fade" id="show_faq_{{ $faq->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-question">{{ $faq->question }}</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ $faq->answer }}</p>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript:;" class="btn width-100 btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/END SHOW PAGE CONTENT-->

            <!--START EDIT PAGE CONTENT-->
            <div class="modal fade" id="edit_faq_{{ $faq->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-question">Edit "{{ $faq->question }}"</h4>
                        </div>
                        <form class="form-horizontal" method="post" action="{{url('/ad/faqs')}}/{{$faq->id}}"> 
                            <div class="modal-body">
                                <div class="panel-body">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="field-1"> Question <span class="required">*</span></label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Page Question" name="question" value="{{ $faq->question }}">
                                        </div>
                                    </div>
                                    <div class="form-group-separator"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="field-1"> Answer <span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control answer-faq" placeholder="Answer" name="answer">{{ $faq->answer }}</textarea>
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
<div class="modal fade" id="add_faq">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-question">Add New Faq</h4>
            </div>

            <form class="form-horizontal" method="post" action="{{url('/ad/faq/add')}}"> 
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="field-1"> Question <span class="required">*</span></label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Page Question" name="question">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="field-1"> Answer <span class="required">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control answer-faq" placeholder="Answer" name="answer"></textarea>
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