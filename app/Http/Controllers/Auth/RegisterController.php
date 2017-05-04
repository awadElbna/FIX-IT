<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use \App\Http\Controllers\Common;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    
    protected function validator(array $data) {
        return Validator::make($data, [

                    'name' => 'required|string|min:5|max:50',
                    'email' => 'required|min:5|max:50|Email|Unique:users',
                    'password' => 'required|min:6|confirmed',
                    'profilephoto' => 'image|mimes:jpeg,jpg,png,gif',
                    'group' => 'in:1,2',
                    'g-recaptcha-response' => 'required',
                        ], [
                    'required' => 'يجب ادخال هذا الحقل ',
                    'name.min' => ' الاسم يجب ان يكون اكبر من 5 حروف',
                    'name.string' => ' برجاء ادخال الاسم صحيح',
                    'email.Email' => ' يجب ادخال البريد الاليكترونى بطريقه صحيحه',
                    'email.unique' => 'عفوا هذا البريد الاليكترونى موجود مسبقا',
                    'password.min' => 'يجب ادخال كلمه مرور اكبر من 6 احرف',
                    'password.confirmed' => 'عفوا يجب ادخال كلمه المرور بطريقه صحيحه',
                    'phone.min' => 'عفوا يجب ادخال رقم التليفون صحيح',
                    'phone.numeric' => 'عفوا يجب ادخال رقم التليفون صحيح',
                    'phone.unique' => 'هذا الرقم محجوز مسبقا',
                    'image' => 'يجب ادخال صوره ',
                        //'recaptcha'    =>'حاول مره اخرى ',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        $coverPath = "images/cover/default.jpeg";

        $profilepath = "images/profile/default.jpg";

        if (isset($data['profilephoto'])) {
            $profilepath = $data['profilephoto']->store('images/cover');
        }
        return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'phone' => $data['phone'],
                    'city' => $data['city'],
                    'group_id' => $data['group'],
                    'img' => $profilepath,
                    'cover' => $coverPath
        ]);
    }

}
