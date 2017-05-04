<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddQuestion;
use App\Question;
use App\Company_detail;
use App\Cat;
use App\Comment;
use App\Like;
use Auth;
use Event;
use Redirect;

class QuestionController extends Controller
{

    public function index()
    {

        $questions = Question::orderBy('id', 'DESC')->paginate(5);
        $cats = Cat::all();
        return view('questions', compact('questions', 'cats'));
    }

    public function changeStatus(Request $request, $id)
    {
        $question = Question::find($id);
        if ($request->status === 'open') {
            $question->status = 'closed';
            $question->save();
        } elseif ($question->status === 'closed') {
            $question->status = 'open';
            $question->save();
        } else {
            $question->save();
        }

        return response()->json(['success' => "success"], 200);
    }

    public function showQuestion($id)
    {
        $question = Question::find($id);
        Event::fire('question', $question);
        //@TODO:Question by category

        $results = Question::where('title', 'LIKE', '%' . $question->title . '%')
            ->where('title', '<>', $question->title)
            ->limit(10)->get();

        $top_rated = Company_detail::orderBy('rating', 'DESC')->limit('10')->get();
        return view('question', compact('results', 'top_rated', 'question'));
    }

    public function add_question(AddQuestion $request)
    {

        Common::globalXssClean($request);
        $question = new Question;
        $question->title = $request->title;
        $question->desc = $request->desc;
        $question->cat_id = $request->cat_id;
        $question->user_id = Auth::id();
        if ($request->hasFile('img')) {
            $question->img = $request->file('img')->store("images/questions");
        }
        $question->save();
        return redirect('/questions');
    }

    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $comments = Comment::where('question_id', '=', $id);
        $comments->forceDelete();
        $question->forceDelete();
        return redirect('/');
//        Recommended redirect on his profile
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->forceDelete();
        return Redirect::back();
    }

    public function editQuestion(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:255',
            'desc' => 'required|min:10',
            'img' => 'mimes:jpeg,png|max:3072',
        ]);
        $question = Question::find($id);
        $question->title = $request->title;
        $question->desc = $request->desc;
        if ($request->file('img')) {
            $question->img = $request->file('img')->store("images/questions");
        }
        $question->save();
        return Redirect::back();
    }

    public function like(Request $request)
    {
        $like = new Like;
        $like->comment_id = $request->comment_id;
        $like->user_id = Auth::user()->id;
        if ($like->save()) {
            $comment = Comment::find($request->comment_id);
            $comment->likes += 1;
            $comment->save();
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }

    }

}
