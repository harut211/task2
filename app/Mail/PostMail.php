<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        $url = url('/approved/' . $this->request->id);
        return $this->view('emails.mail')
            ->subject($this->request->title)
            ->with([
                'title' => $this->request->title,
                'content' => $this->request->content,
                'url' => $url,
            ]);
    }
}
