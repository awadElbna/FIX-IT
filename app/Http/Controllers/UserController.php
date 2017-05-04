<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;
use Redirect;

class UserController extends Controller
{

    public function showUserQuestions($id)
    {
        $users = User::find($id);
//        dd($users->questions);
//        $userQuestions = DB::table('users')
//            ->join('questions', 'users.id', '=', 'questions.user_id')
//            ->where('questions.id', '=', $id)
//            ->select('questions.*')
//            ->get();

//        $cats = DB::table('questions')
//            ->join('cats', 'questions.id', '=', 'cats.id')
//            ->where('cats.id', '=', $id)
//            ->select('cats.*')
//            ->get();


//        $comments = DB::table('questions')
//            ->join('comments', 'questions.id', '=', 'comments.id')
//            ->where('comments.id', '=', $id)
//            ->select('comments.*')
//            ->get();
//        $commentsNumber = $comments->count();
        // dd($commentsNumber);

        return view("userProfile", compact('users'));
    }


    public function updateUser(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|min:4|max:50',
            'city' => 'required|string',
            'phone' => 'required|regex:/[0-9+]+/|min:8|max:14|string',
            'img' => 'mimes:jpeg,jpg,png,gif',
            'cover' => 'mimes:jpeg,jpg,png,gif',
        ], [
            'city.required' => 'يجب ادخال حقل المدينة .',
            'city.string' => 'يجب ادخال حقل المدينة بشكل صحيح .',
            'name.required' => 'يجب ادخال حقل الاسم .',
            'phone.required' => 'يجب ادخال حقل الهاتف .',
            'name.min' => ' الاسم يجب ان يكون اكبر من 5 حروف .',
            'name.string' => ' برجاء ادخال الاسم صحيح .',
            'phone.min' => 'عفوا يجب ادخال رقم التليفون صحيح .',
            'phone.numeric' => 'عفوا يجب ادخال رقم التليفون صحيح .',
            'img.mimes' => 'برجاء اختيار صورة .',
            'cover.mimes' => 'برجاء اختيار صورة .',
            'phone.regex' => 'برجاء ادخال رقم الهاتف بشكل صحيح .',
            'phone.min' => 'برجاء ادخال رقم الهاتف بشكل صحيح .',
            'phone.max' => 'برجاء ادخال رقم الهاتف بشكل صحيح .',
            'phone.string' => 'برجاء ادخال رقم الهاتف بشكل صحيح .',
        ]);

        $users = User::find(Auth::id());
        $users->name = $request->name;
        // $users->email = $request->email;
        $users->city = $request->city;
        $users->phone = $request->phone;
        if ($request->file('img')) {
            $users->img = $request->file('img')->store('asset(images/profile)');
        }
        if ($request->file('cover')) {
            $users->cover = $request->file('cover')->store('images/cover');
        }
        $users->save();
        // return response()->json($users->save(), 200);
        return Redirect::back();
    }
}