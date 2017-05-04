<?php

namespace App\Http\Controllers;
use App\Faq;
use App\Http\Requests\AddFaq;
//use Illuminate\Http\Request;

class FaqController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $faqs = Faq::all();
        return view('faq', compact('faqs'));
    }

    public function showFaqForm(){
        return view('admin.faqForm');
    }

    /**
     * validate, sanitize faq, and add request
     * @param AddFaq $request
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function addFaq(AddFaq $request){
//        Common::globalXssClean($request);
//        $faq = new Faq();
//        $faq->question = $request->question;
//        $faq->answer = $request->answer;
//        $faq->save();
//        return back();
//    }
}
