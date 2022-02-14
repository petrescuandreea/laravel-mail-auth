<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VideogameDeleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $videogame;

    public function __construct($videogame)
    {
        $this -> videogame = $videogame;
    }

    
    public function build()
    {
        return $this -> from('no-reply@miosito.com')
                     -> view('mail.videogameDelete');
    }
}
