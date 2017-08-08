<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($index)
    {
        $this->index = $index;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build($email=null)
    {
        switch ($this->index) {
            case 0:
                return $this->view('mail.join');
                break;
            default:
                $code = rand(5000,10000);
                session($email,$code);
                return $this->view('mail.reset')->with('code',$code);
                break;
        }
        
    }
}
