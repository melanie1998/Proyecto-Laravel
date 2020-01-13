<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use User;

class Incidencia extends Model
{

    use Notifiable;

    protected $table = 'Incidencia';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombreProfesor', 'fechaIncidencia', 'aula', 'codigoIncidencia', 'estado', 'especificacion', 'equipo', 'profesorId', 'comentarios'
    ];

    public function profesor(){
        return $this->belongsTo(User::class);
    }
   

    
}
