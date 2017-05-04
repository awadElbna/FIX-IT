<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rating;

class RateCompany extends Controller
{

    public function view_rate(Request $request)
    {
        $ratings = Rating::paginate(5);
        // dd($companys);
        return view("admin.Rate", compact( 'ratings'));
    }

    public function deleteRate($id)
    {
        $ratings = Rating::find($id);
        $ratings->delete();
        return back();
    }
    
}