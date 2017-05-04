<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class contact extends Notification {

    use Queueable;

    protected $question;

    public function __construct(\App\Question $question) {
        $this->question = $question;
    }

    public function via($notifiable) {
        return ['database'];
    }

    public function toArray($notifiable) {
        return [
            'data' => 'عرض جديد لشركتك على  : <b>' . $this->question->title . '</b>' . ' من المستخدم: <b>' . auth()->user()->name . '</b>',
            'question_id' => $this->question->id
        ];
    }

}
