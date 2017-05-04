@extends('layouts.admin')

@section('content')

{{--    @if(Auth::user()->group_id == 3)--}}
    @if(true)

            <form method="post" action="{{ URL('/faq/add') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="question">Question</label>
                    <input class="form-control" type="text" name="question" placeholder="Question">
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea class="form-control" rows="3" name="answer" placeholder="Answer"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i>
                        Save
                    </button>
                </div>
            </form>
    @endif

@endsection