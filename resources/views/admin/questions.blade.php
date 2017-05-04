@extends('layouts.admin')

@section('content')

        <ol class="breadcrumb pull-right">
            <li><a href="">Home</a></li>
            <li class="active">Questions</li>
        </ol>
        <h1 class="page-header">Questions</h1>
        <div class="section-container section-with-top-border">
            <div class="panel pagination-inverse m-b-0 clearfix">
                <table id="data-table" data-order='[[1,"asc"]]' class="table table-bordered table-hover">
                    <thead>
                    <tr class="inverse">
                        <th>Title</th>
                        <th>Visited</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($questions))
                        @foreach($questions as $question)
                            <tr class="gradeA" @if($question->trashed()) style="background-color:#ff8080" @endif>
                                <td>{{$question->title}}</td>
                                <td>{{$question->visited}}</td>
                                <td>{{$question->status}}</td>
                                <td>{{$question->cat->title}}</td>
                                <td>{{$question->user->name}}</td>
                                <td>
                                    <a class="btn btn-info" data-toggle="modal" data-target="#{{$question->id}}">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                    <a href="{{url('/ad/question/delete')}}/{{$question->id}}"
                                       class="btn btn-danger btn-rounded">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{url('/ad/question/restore')}}/{{$question->id}}"
                                       class="btn btn-lime btn-rounded">
                                        <i class="fa fa-undo"></i>
                                    </a>
                                </td>
                            </tr>
                            <!---------- Modal ---------->
                            <form accept-charset="UTF-8" action="" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="{{$question->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Question Info</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Description</label>
                                                    <textarea rows="4" cols="50" disabled>{{$question->desc}}</textarea>
                                                    {{ csrf_field() }}
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Image</label>
                                                    <img src="{{asset($question->img)}}" alt="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Created From : {{\Carbon\Carbon::parse($question->created)->diffForHumans()}}</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                                            class="ti-na"></i>Exit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$questions->links()}}
            </div>
        </div>


        <div id="footer" class="footer">
                    <span class="pull-right">
                        <a href="javascript:;" class="btn-scroll-to-top" data-click="scroll-top">
                            <i class="fa fa-arrow-up"></i> <span class="hidden-xs">Back to Top</span>
                        </a>
                    </span>
            &copy; 2016 <a href="http://elmanawy.info">Marwa El-Manawy</a> All Right Reserved
        </div>

@endsection