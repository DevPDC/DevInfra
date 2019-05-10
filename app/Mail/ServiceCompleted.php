<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Post;

class ServiceCompleted extends Mailable
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
        return $this->markdown('vendor.notifications.service-completed')
                    ->from('ppdismaintenance@gmail.com')
                    ->subject('Service Completed')
                    ->with([
                        'postId' => $this->posts->id,
                        'postTitle' => $this->posts->request_title,
                    ]);;
    }
}
