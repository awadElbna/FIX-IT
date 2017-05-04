<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Question;
use App\Company_detail;
use Auth;

class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cats = Cat::all();

        $questions = Question::orderBy('id', 'DESC')->limit('20')->get();
        $top_rated = Company_detail::orderBy('rating', 'DESC')->limit('10')->get();

        return view('welcome', compact('cats', 'questions', 'top_rated'));
    }

    /**
     * show company details form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function company_details() {

        return view('company_details');
    }

    /**
     * update company details
     * @param Request $Request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function details(Request $Request) {

        $this->validate($Request, [
            'address' => 'required|string|min:6|max:50',
            'desc' => 'required|string|min:20|max:255',
                ], [
            'address.required' => ' برجاء ادخال عنوان الشركه',
            'address.min' => ' عنوان الشركه 6 حروف على الاقل',
            'address.max' => ' عنوان الشركه 50 حرف على الاكثر.',
            'desc.required' => ' برجاء كتابه وصف للشركه',
            'desc.min' => ' وصف الشركه يجب ان يكون 20 حرف على الاقل',
            'desc.max' => ' يجب ان لا يكون الوصف اكبر من 255 حرف',
        ]);

        $comp = Company_detail::where('company_id', '=', Auth::id())->first();

        $comp->address = $Request->address;

        $comp->desc = $Request->desc;

        $comp->save();

        return redirect('/');
    }

}
