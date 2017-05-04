<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqsController extends Controller {

    public function index() {
        $faqs = Faq::all();
        return view('admin/faqs', compact('faqs'));
    }

    public function addFaq(Request $request) {
        $page = new Faq;
        $this->validate($request, [
            'question' => 'required|min:3|max:200',
            'answer' => 'required|min:7',
        ]);
        $page->question = $request->question;
        $page->answer = $request->answer;

        $page->save();
        return redirect('/ad/faqs');
    }

    public function editFaq(Request $request, $id) {
        $page = Faq::find($id);
        $this->validate($request, [
            'question' => 'required|min:3|max:50',
            'answer' => 'required|min:7',
        ]);

        $page->question = $request->question;
        $page->answer = $request->answer;

        $page->save();
        return redirect('/ad/faqs');
    }

    public function deleteFaq($id) {
        $page = Faq::find($id);
        $page->delete();
        return redirect('/ad/faqs');
    }


}
