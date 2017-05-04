<?php

namespace App\Http\Controllers;
use App\User;
use App\Cat;
use App\Question;
use App\Faq;
use App\Page;
use App\Rating;

class DashboardController extends Controller {

    public function index() {
        $customers = User::where('group_id','=','1')->count();
        $companies = User::where('group_id','=','2')->count();
        $admins = User::where('group_id','=','3')->count();
        $categories = Cat::count();
        $questions = Question::count();
        $faqs = Faq::count();
        $pages = Page::count();
        $contacts = Rating::count();
        return view('/admin/dashboard', compact('customers','companies','admins','categories','questions','faqs','pages','contacts'));
    }

}
