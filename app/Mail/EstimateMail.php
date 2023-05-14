<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EstimateMail extends Mailable
{
    use Queueable, SerializesModels;
    public array $estimateData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $estimateData)
    {
        $this->estimateData = $estimateData;
    }

    public function build() : object
    {
        return $this->subject('Смета от сайта YourBuild')
            ->view('emails.estimate');
    }
}
