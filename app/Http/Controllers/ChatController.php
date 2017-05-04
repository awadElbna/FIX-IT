<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Redis;
use Redis;
use App\Message;
use Auth;
use App\User;
class ChatController extends Controller
{
    

    public function index($id){
        $messages = Message::where(function($query) use($id){
            $query->where('receiver_id', Auth::id())
                ->where('sender_id', $id);
        })->orWhere(function($query) use($id){
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $id);
        })->orderBy('id', 'ASC')->get();

        $user = User::where('id', $id)->first(['id', 'name', 'img']);

        return view('message', compact('messages', 'user'));
    }
    


    public function sendMessage(Request $request, $id){
        Common::globalXssClean($request);
        //TODO: validate message
        $message = new Message;
        $message->msg = $request->get('message');
        $message->sender_id = $request->get('sender_id');
        $message->receiver_id = $id;
        $message->save();
        $redis = Redis::connection();
        $data = ['message' => $request->get('message'),
            'user' => $request->get('user'),
            'receiver_id' => $request->get('receiver_id'),
            'sender_id' => $request->get('sender_id'),
            'img' => $request->get('img')];
        $redis->publish('message', json_encode($data));
        return response()->json([]);
    }

    public function readAll($id){
        $msgs = Message::where('readed_at', null)->where('receiver_id', $id)->get();
        foreach ($msgs as $msg){
            $msg->readed_at = \Carbon\Carbon::now();
            $msg->save();
        }
        return response()->json(['success' => true], 200);
    }
}
