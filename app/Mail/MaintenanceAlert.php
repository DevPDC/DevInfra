<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MaintenanceAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $facilities;

    public function __construct($facilities)
    {
        $this->facilities = $facilities;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.notifications.maintenance-alert')
                    ->from('PPDISMAINTENANCE@GMAIL.COM')
                    ->subject('Maintenance Schedules');
    }
}
