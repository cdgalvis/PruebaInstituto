<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoEnviado extends Mailable
{
    use Queueable, SerializesModels;
    protected $cursoinscrito,$informacion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cursoinscrito,$informacion)
    {
        $this->cursoinscrito = $cursoinscrito;
        $this->informacion = $informacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.notificacion')
                    ->with([
                        "cursoinscrito" => $this->cursoinscrito,
                        "informacion" => $this->informacion,
                    ]);;
    }
}
