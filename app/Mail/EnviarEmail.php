<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

class EnviarEmail extends Mailable
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
    //pasamos los datos
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

     //definimos el usuario al que se le va a enviar el email, el asunto y la vista que le vamos a enviar pasando los datos 
    public function build()
    {
        return $this->from('melaniemiguel16@gmail.com')->subject('Nueva Incidencia')->view('datosEnviadosEmail')->with('datos', $this->datos, 'id', $this->id);
    }
    
}
