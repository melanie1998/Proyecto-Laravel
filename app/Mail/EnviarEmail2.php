<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarEmail2 extends Mailable
{
    use Queueable, SerializesModels;

    //declaramos los datos
    public $datos;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */

     //los pasamos
    public function __construct($datos, $id)
    {
        $this->datos=$datos;
        $this->id=$id;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */

     //definimos el usuario desde donde se va a enviar el email, el asunto y la vista que va a recibir el profesor que mandó la incidencia, con los datos actualizados
    public function build()
    {
        return $this->from('melaniemiguel16@gmail.com')->subject('Nueva Incidencia')->view('datosEnviadosEmail2')->with('datos', $this->datos, 'id', $this->id);
    }
}
