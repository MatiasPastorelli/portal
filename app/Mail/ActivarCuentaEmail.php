<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivarCuentaEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($data)
    {
        // parametros para ser utilizados en el template del correo
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('matias@informatica.isbast.com')
                    ->view('mails2.activarcuenta')
                    ->subject('Activación de cuenta touchouse');
    }
}
