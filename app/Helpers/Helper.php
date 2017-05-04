<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Helpers;

use App\Page;
use App\Setting;

class Helper
{
    public static function pages()
    {
         return Page::all();
    }

    public static function settings()
    {
         return Setting::all();
    }
}
