<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencia;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarEmail;
use App\Mail\EnviarEmail2;
use App\Profesor;

class Controlador extends Controller
{

    //esta funcion hará que se muestren los datos guardados en la variable $datos donde profesorId sea igual al id del usuario logueado para que se muestren solo los datos de ese usuario
    //y qse mostrarán en la vista "listaIncidencia"
    public function lista(){
        $datos=Incidencia::select('id','nombreProfesor', 'fechaIncidencia', 'aula', 'codigoIncidencia', 'estado','equipo' ,'profesorId', 'comentarios')->where('profesorId', Auth::guard('profesor')->user()->id)->get();
        return view('listaIncidencia')->with('datos',$datos);
    }

 
    //funcion para crear una incidencia nueva
    public function crearIncidencia(Request $request){

        $validator = Validator::make($request->all(),[
        'nombreProfesor' => 'required|min:3|max:255',
        'fechaIncidencia' => 'required',
        'aula' => 'required|digits_between:3,3|numeric',
        'codigoIncidencia' => 'required',
        'especificacion' => 'min:0|max:255',
        'equipo' =>'required|regex:/^HZ[1-9]{6}$/',
      

    

        ],[

        'required' => 'El/La :attribute es obligatorio.',
        'nombreProfesor.min' => 'El :attribute tiene que ser de minimo 3 letras',
        'nombreProfesor.max' => 'El :attribute tiene que ser de maximo 255 letras',
        'fecha.date_format' => 'La :attribute tiene que ser d/m/Y.',
        'aula.digits_between' => 'El :attribute tiene que ser de máximo y de mínimo 3 numeros',
        'especificacion.min' => 'El :attribute tiene que ser de minimo 0 letras',
        'especificacion.max' => 'El :attribute tiene que ser de maximo 255 letras',
        'equipo.regex' => 'El :attribute tiene que ser HZxxxxxx',
        'numeric' => 'El:attribute tiene que ser numerico',
        'alpha' => 'El :attribute tiene que ser de tipo alpha',
         



        
        ]);

    

        if ($validator->fails()) {
             return redirect()->back()
             ->withErrors($validator)
             ->withInput();
                        
        }else{
         

            $datos = new Incidencia($request->all());
            $datos->profesorId = Auth::guard('profesor')->user()->id;
            $datos->save();

            //en la variable $id guardo el último id que se ha guardado en la base de datos para poder pasarlo a la vista
            $id = Incidencia::select('id')->latest()->first();

            //en la variable $email guardo el email de admin, para cogerlo busco el admin que tenga 1 en el atributo
            $email = Profesor::select('email')->where('admin', '1')->get();

            //se manda el email pasando los datos y la id
            Mail::to($email)->send(new EnviarEmail($datos, $id));
            return view('detallesIncidencia', ['datos' => $request->all(), 'id' => $id]);
        
        }

        
        
        
    }


    //para modificar los datos, desde la ruta paso la id al atributo $value, y selecciono los datos comparando la id para que sea la misma
    public function pasarDatos($value){
        $datos = Incidencia::select('id','nombreProfesor', 'fechaIncidencia', 'aula', 'codigoIncidencia', 'especificacion', 'estado','equipo', 'comentarios')->where('id', $value)->get();
        
        //$id = Incidencia::select('id')->where('id', $value)->get();
        $id = Incidencia::select('id')->where('id', $value)->get();
        return view('modificarIncidencia', ['datos' => $datos, 'id' => $id]);
    }



    //funcion para actualizar los datos
    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
        'nombreProfesor' => 'required|min:3|max:255',
        'fechaIncidencia' => 'required',
        'aula' => 'required|digits_between:3,3|numeric',
        'codigoIncidencia' => 'required',
        'especificacion' => 'min:0|max:255',
        'equipo' =>'required|regex:/^HZ[1-9]{6}$/',

        ],[

        'required' => 'El :attribute es obligatorio.',
        'nombreProfesor.min' => 'El :attribute tiene que ser de minimo 3 letras',
        'nombreProfesor.max' => 'El :attribute tiene que ser de maximo 255 letras',
        'fecha.date_format' => 'La :attribute tiene que ser d/m/Y.',
        'aula.digits_between' => 'El :attribute tiene que ser de máximo y de mínimo 3 numeros',
        'especificacion.min' => 'El :attribute tiene que ser de minimo 0 letras',
        'especificacion.max' => 'El :attribute tiene que ser de maximo 255 letras',
        'equipo.regex' => 'El :attribute tiene que ser HZxxxxxx',
        'numeric' => 'El:attribute tiene que ser numerico',
        'alpha' => 'El :attribute tiene que ser de tipo alpha',

            
            ]);

             
    
            if ($validator->fails()) {
                 return redirect()->back()
                 ->withErrors($validator)
                 ->withInput();
                            
            }else{

                //en la variable $datos se van a guardar los datos donde la id sea la misma que el parámetra $id
                $datos = Incidencia::findOrFail($id);
                $datos->nombreProfesor = $request->input('nombreProfesor');
                $datos->fechaIncidencia = $request->input('fechaIncidencia');
                $datos->aula = $request->input('aula');
                $datos->codigoIncidencia = $request->input('codigoIncidencia');
                $datos->especificacion = $request->input('especificacion');
                $datos->estado = $request->input('estado');
                $datos->equipo = $request->input('equipo');
                $datos->profesorId = Auth::guard('profesor')->user()->id;
                $datos->update();

                //en $email guardo el email de un admin, y paso los datos y la id para mostrarla en una vista
                $email = Profesor::select('email')->where('admin', '1')->get();
                Mail::to($email)->send(new EnviarEmail2($datos, $id));
                return view('datosActualizados')->with(['datos' => $request->all()]);
            }
              
            
            }

          
            //funcion para eliminar los datos de la base de datos
            public function delete($id){

                $datos = Incidencia::findOrFail($id);
                $datos->delete();
                return redirect('listaIncidencia')->with('success', 'Datos eliminados correctamente');
            }

            //funcion para ver detalles de una incidencia
            public function consultaIncidencia($id){
                $datos = Incidencia::select('id','nombreProfesor', 'fechaIncidencia', 'aula', 'codigoIncidencia', 'especificacion', 'estado','equipo','profesorId', 'comentarios')->where('id', $id)->get();
                return view('consultaIncidencia', ['datos' => $datos]);

            }
    


}

