<?php

namespace App\Http\Controllers;

use App\Page;

class PageController extends Controller {

    public function index($id) {
        $page = Page::find($id);
        return view('page', compact('page'));
    }

}
