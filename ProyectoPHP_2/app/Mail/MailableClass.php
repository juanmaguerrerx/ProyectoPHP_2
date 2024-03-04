<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailableClass extends Mailable
{
    use Queueable, SerializesModels;

    public $subject; // Asigna el asunto del correo
    public $content; // Asigna el contenido del correo
    public $cuota;
    public $cliente;
    public $factura;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $cuota, $cliente, $factura = false)
    {
        $this->subject = $subject;
        $this->cuota = $cuota;
        $this->cliente = $cliente;
        $this->factura = $factura;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->factura) {
            return $this->subject($this->subject)
                ->view('cuotas.factura') // Aquí puedes especificar la vista del correo electrónico
                ->with([
                    'cliente' => $this->cliente,
                    'cuota' => $this->cuota
                ]);
        } else {
            return $this->subject($this->subject)
                ->view('emails.view') // Aquí puedes especificar la vista del correo electrónico
                ->with([
                    'cliente' => $this->cliente,
                    'cuota' => $this->cuota
                ]);
        }
    }
}
