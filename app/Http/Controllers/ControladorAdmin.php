<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencia;
use App\Profesor;
use Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarEmailaProfesor;

class ControladorAdmin extends Controller
{

    //en la variable $datos guardo todos los datos de la tabla incidencias para mostrarlos en una vista
    public function lista(){
        $datos=Incidencia::select('id','nombreProfesor', 'fechaIncidencia', 'aula', 'codigoIncidencia', 'estado','equipo', 'profesorId')->get();
        return view('Admin.ListaIncidencias')->with('datos',$datos);
    }


    //selecciono los datos donde la id sea igual que el valor de el parametro y los muestro en el formulario 
    public function pasarDatos($value){
        $datos = Incidencia::select('id','nombreProfesor', 'fechaIncidencia', 'aula', 'codigoIncidencia', 'especificacion', 'equipo', 'profesorId', 'estado', 'comentarios')->where('id', $value)->get();
        return view('Admin.modificarIncidencia', ['datos' => $datos]);
    }


    //funcion para modificar los datos
    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            
            'estado' =>'required|integer|between:1,4',
            'comentarios' => 'required|min:0|max:255',
    
        
    
            ],[
    
                'required' => 'El :attribute es obligatorio.',
                'integer' => 'El :attribute tiene que ser de tipo integer',
                'estado.between' => 'El :attribute tiene que ser un numero del 1 al 10',
                'comentarios.min' => 'El :attribute tiene que ser de minimo 0 letras',
                'comentarios.max' => 'El :attribute tiene que ser de maximo 255 letras',
    
            
            ]);
    
            if ($validator->fails()) {
                 return redirect()->back()
                 ->withErrors($validator)
                 ->withInput();
                            
            }else{

                $datos = Incidencia::findOrFail($id);
                if($request->input('estado') == '1'){
                    $datos->estado = "Recibida";
                }else if($request->input('estado') == '2'){
                    $datos->estado = "Resuelta";
                }else if($request->input('estado') == '3'){
                    $datos->estado = "En proceso";
                }else if($request->input('estado') == '4'){
                    $datos->estado = "Rechazada";
                }
                $datos->comentarios = $request->input('comentarios');
                $datos->update();

                //en $email guardo el email del profesor que ha enviado la incidencia que el admin ha modificado
                $emailProfesor = Profesor::select('email')->where('id', $id)->get();
                Mail::to($emailProfesor)->send(new EnviarEmailaProfesor($datos));

                //redirecciono a la lista con un mensaje
                return redirect()->to('verLista')->with('datos', $datos)->with('success', 'Datos actualizados y reenviados correctamente');
            }
              
            
        }

        //funcion para eliminar los datos de la base de datos
        public function delete($id){

            $datos = Incidencia::findOrFail($id);
            $datos->delete();

            return redirect('Admin.ListaIncidencias')->with('success', 'Datos eliminados correctamente');
        }

     

        //funcion para ver los detalles de una sola incidencia
        public function consultaIncidencia($id){
            $datos = Incidencia::select('id','nombreProfesor', 'fechaIncidencia', 'aula', 'codigoIncidencia', 'especificacion', 'equipo', 'profesorId', 'estado','comentarios')->where('id', $id)->get();
            
            return view('Admin.consultaIncAdmin', ['datos' => $datos]);

        }


}
