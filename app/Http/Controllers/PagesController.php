<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PagesController extends Controller {

    public function index() {
        $pages = Page::all();
        return view('admin/pages', compact('pages'));
    }

    public function addPage(Request $request) {
        $page = new Page;
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
            'content' => 'required|min:7',
        ]);
        $page->title = $request->title;
        $page->content = $request->content;

        $page->save();
        return redirect('/ad/pages');
    }

    public function editPage(Request $request, $id) {
        $page = Page::find($id);
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
            'content' => 'required|min:7',
        ]);

        $page->title = $request->title;
        $page->content = $request->content;

        $page->save();
        return redirect('/ad/pages');
    }

    public function deletePage($id) {
        $page = Page::find($id);
        $page->delete();
        return redirect('/ad/pages');
    }


}
