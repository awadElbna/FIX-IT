<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Rating;

use Auth;

use Response;

use Illuminate\Foundation\Auth\RegisterController;

use carbon\Carbon;

class CompanyController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        if(!isset($user) || !isset($user->company)){
            echo "لا يوجد شركة ";
        }
        else if($user->group_id == '2'){

            $user_comments = Rating::where('company_id', '=', $id)->where('status', '!=', 1)->orderBy('created_at', 'ASC')->get();

            $login_user = Auth::id();
            $user_status = Rating::where('company_id', '=', $id)->where('user_id', '=', $login_user)->where('status', '=', '0')->first();

            $user_status1 = Rating::where('company_id', '=', $id)->where('user_id', '=', $login_user)->where('status', '=', '1')->first();
            if ($user_status == '') {
                $status = false;
            } else {
                $status = true;
            }
            if ($user_status1 != '') {
                $status = true;
            }
            return view('company', compact('user', 'user_comments', 'status'));
        }else{
            echo "لا يوجد شركة ";
        }
        
    }

    public function rate_company(Request $request)
    {
        $this->validate(request(), [
            'company_id' => 'required',
            'review' => 'required',
            'stars' => 'required'
        ], ['required' => "برجاء ادخال تعليقك"]);

        $review_before = Rating::where("user_id", "=", Auth::id())->where("company_id", "=", $request->company_id)->where("status", "=", '1')->first(); 
        if ($review_before) {
            return Response::json(['error' => 'لقد تم عمل تقيم من قبل'], 404); // Status code here
        }

        $review = Rating::where("user_id", "=", Auth::id())->where("company_id", "=", $request->company_id)->where("status", "=", '0')->first();
        if (!$review) {
            return Response::json(['error' => 'لم يتم التواصل من قبل'], 404); // Status code here

        } else {
            $review->stars = $request->stars;
            $review->review = $request->review;
            $review->created_at = Carbon::now();
            $review->status = '1';
            $review->save();

            $no_rate = Rating::where('company_id','=', $request->company_id)->where('status', '=', '1')->count();
            $sum_rate = Rating::where('company_id','=', $request->company_id)->where('status', '=', '1')->sum('stars');
            $newRate = $sum_rate / $no_rate;
            $user = User::find($request->company_id)->company;
            $user ->rating = $newRate;
            $user->save();

        }
        return redirect('company/'.$request->company_id);

    }
    public function editProfile(Request $request){
        $this->validate(request(), [
            'name'           => 'required|string|min:4|max:50',  
            'phone'          => 'required|regex:/[0-9+]+/|min:8|max:14|string',
            'img'     => 'mimes:jpeg,jpg,png,gif',
            'cover'   => 'mimes:jpeg,jpg,png,gif',
            'desc'           => 'required|string|min:4',
        ], [    'name.required'      => 'يجب ادخال حقل الاسم .',
                'phone.required'      => 'يجب ادخال حقل الهاتف .',
                'name.min'      => ' الاسم يجب ان يكون اكبر من 5 حروف .',
                'name.string'   => ' برجاء ادخال الاسم صحيح .',
                'phone.min'     => 'عفوا يجب ادخال رقم التليفون صحيح .',
                'phone.numeric' => 'عفوا يجب ادخال رقم التليفون صحيح .',
                'img.mimes' => 'برجاء اختيار صورة .',
                'cover.mimes' => 'برجاء اختيار صورة .',
                'desc.required'=> 'يدب ادخال وصف الشركة .',
                'desc.string'=> 'يجب ادخال وصف الشركة بشكل صحيح .',
                'desc.min' => 'يجب ادخال وصف الشركة بشكل صحيح .',
                'phone.regex' => 'برجاء ادخال رقم الهاتف بشكل صحيح .',
                'phone.min' => 'برجاء ادخال رقم الهاتف بشكل صحيح .',
                'phone.max' => 'برجاء ادخال رقم الهاتف بشكل صحيح .',
                'phone.string' => 'برجاء ادخال رقم الهاتف بشكل صحيح .',
                ]);

        $user= User::find(Auth::id());
        $user->name=$request->name;
        if($request->hasFile('img')){
            $user->img=$request->file('img')->store('images/profile');
        }
        if($request->hasFile('cover')){
            $user->cover=$request->file('cover')->store('images/cover');
        }
        $user->phone=$request->phone;
        $user->city=$request->city;
        $user->save();
        return back();
    }
}