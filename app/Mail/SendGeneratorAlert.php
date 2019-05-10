<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendGeneratorAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $fac;

    public $percentage;

    public $cap;

    public $opthours;

    public function __construct($fac)
    {
        $this->fac = $fac;
        // $this->percentage = $percentage;
        // $this->cap = $cap;
        // $this->opthours = $opthours;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->fac[2]);
        return $this->markdown('vendor.notifications.genset-alert')
                    ->from('PPDISMAINTENANCE@GMAIL.COM')
                    ->subject('Maximum Capacity Reached')
                    ->with([
                        'gensetname' => $this->fac[2]->name,
                        'gensetid' => $this->fac[2]->id,
                        'gensetcapacity' => $this->cap,
                        'gensethours' => $this->opthours
                    ]);
    }
}
