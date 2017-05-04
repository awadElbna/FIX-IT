<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
class AdminController extends Controller
{

    /**
     * Show all questions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showQuestions(){
        $questions = Question::withTrashed()->paginate(20);
        return view('admin.questions', compact('questions'));
    }

    /**
     * Delete question by id Softly
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteQuestion($id){
        Question::find($id)->delete();
        return back();
    }

    /**
     * Restore question using id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restoreQuestion($id){
        Question::onlyTrashed()->find($id)->restore();
        return back();
    }
}
