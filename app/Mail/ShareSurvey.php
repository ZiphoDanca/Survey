<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShareSurvey extends Mailable
{
    use Queueable, SerializesModels;

    public $survey,$user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($survey,$user)
    {
        $this->survey = $survey;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.shareSurvey');
    }
}
