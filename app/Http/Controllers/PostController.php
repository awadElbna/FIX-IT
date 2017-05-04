<?php

namespace App\Http\Controllers;


class PostController extends Controller {

    public function seen() {
        foreach(auth()->user()->unreadNotifications as $note){
        	$note->MarkAsRead();
        }
    }
}
