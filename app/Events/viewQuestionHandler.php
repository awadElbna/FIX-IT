<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Session\Store;
use App\Question;
class viewQuestionHandler
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $session;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session=$session;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    public function handle(Question $question)
    {
        if ( ! $this->isQuestionViewed($question))
       {
        $question->increment('visited');
        // $question->visited += 1;

        $this->storeQuestion($question);
    }
    }

    private function isQuestionViewed($question)
{
    // Get all the viewed posts from the session. If no
    // entry in the session exists, default to an
    // empty array.
    $viewed = $this->session->get('viewed_quesion', []);

    // Check the viewed posts array for the existance
    // of the id of the post
    return in_array($question->id, $viewed);
}

private function storeQuestion($question)
{
    // Push the post id onto the viewed_posts session array.
    $this->session->push('viewed_question', $question->id);
}



}
