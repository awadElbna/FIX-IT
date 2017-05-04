<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller {

    public function index() {
        $settings = Setting::all();
        return view('admin/settings', compact('settings'));
    }

    public function editSettings(Request $request, $id) {
        $settings = Setting::find($id);
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
            'copyrights' => 'required|min:7',
            'meta_description' => 'required|min:7',
            'meta_keywords' => 'required|min:7',
            'fb_account' => 'required|min:7|url',
            'tw_account' => 'required|min:7|url',
            'yt_account' => 'required|min:7|url',
            'gp_account' => 'required|min:7|url',
            'google_ann' => 'required|min:7',
            'webmaster_email' => 'required|email',
            'support_email' => 'required|email',
            'phone' => 'required|numeric',
        ]);
        $settings->title = $request->title;
        $settings->copyrights = $request->copyrights;
        $settings->meta_description = $request->meta_description;
        $settings->meta_keywords = $request->meta_keywords;
        $settings->fb_account = $request->fb_account;
        $settings->tw_account = $request->tw_account;
        $settings->yt_account = $request->yt_account;
        $settings->gp_account = $request->gp_account;
        $settings->google_ann = $request->google_ann;
        $settings->webmaster_email = $request->webmaster_email;
        $settings->support_email = $request->support_email;
        $settings->phone = $request->phone;

        $settings->save();
        return redirect('/ad/settings');
    }

}
