<?php

namespace App\Listeners;

use App\Events\FeedbackCreated;
use App\Mail\FeedbackCreatedEmail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendFeedbackEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\FeedbackCreated  $event
     * @return void
     */
    public function handle(FeedbackCreated $event)
    {
        $feedbackText = $event->feedbackText;

        $otherUsers = User::where('id', '!=', auth()->id())->get(); // Adjust this query to fetch the intended recipients
        foreach ($otherUsers as $user) {
           Mail::to($user)->send(new FeedbackCreatedEmail($feedbackText));
    }
    }
}
