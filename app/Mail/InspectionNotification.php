<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InspectionNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $postSend;

    public function __construct($postSend)
    {
        $this->posts = $postSend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.notifications.inspection-notify')
                    ->from('ppdismaintenance@gmail.com')
                    ->subject('Ocular Inspection Completed')
                    ->with([
                        'postId' => $this->posts->id,
                        'postTitle' => $this->posts->request_title,
                    ]);;
    }
}
