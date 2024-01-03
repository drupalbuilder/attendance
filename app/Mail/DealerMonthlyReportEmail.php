<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DealerMonthlyReportEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $params;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $path = public_path('reports/' . $this->params['file_name']);

        return $this->subject('Monthly report of '. $this->params['dealer_name'] .' from whatsapp chatbot')->view('emails.dealer_report_mail')->attach($path);
    }
}
