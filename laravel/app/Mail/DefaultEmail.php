<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Email;

class DefaultEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->email->fromName) {
            $from = [
                'email' => $this->email->from,
                'name' => $this->email->fromName
            ];
            $this->from(
                $from
            );
        } else {
            $this->from($this->email->from);
        }
        $this->to($this->email->to);
        $this->subject($this->email->subject);
        if (count($this->email->cc)) {
            $this->cc($this->email->cc);
        }
        if (count($this->email->bcc)) {
            $this->cc($this->email->bcc);
        }
        if ($this->email->text_body) {
            $this->text('emails.default_text');
        }
        return $this->view('emails.default');
    }
}
