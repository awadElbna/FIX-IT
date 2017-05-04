<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;

class CategoriesController extends Controller {


    public function index() {
        $cats = Cat::all();
        return view('admin/categories', compact('cats'));
    }

    public function addCat(Request $request) {
        $cat = new Cat;
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
        ]);
        $cat->title = $request->title;

        $cat->save();
        return redirect('/ad/categories');
    }

    public function editCat(Request $request, $id) {
        $cat = Cat::find($id);
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
        ]);

        $cat->title = $request->title;

        $cat->save();
        return redirect('/ad/categories');
    }

    public function deleteCat($id) {
        $cat = Cat::find($id);
        $cat->delete();
        return redirect('/ad/categories');
    }


}
