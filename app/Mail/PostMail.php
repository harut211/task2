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
//    protected $token;
    protected $post;

    public function __construct( $post)
    {
//        $this->token = $token;
        $this->post = $post;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        $token = sha1($this->post->id);
        $url = url('/approved/' . $token);
        return $this->view('emails.mail')
            ->subject($this->post->title)
            ->with([
                'title' => $this->post->title,
                'content' => $this->post->content,
                'url' => $url,
            ]);
    }
}
