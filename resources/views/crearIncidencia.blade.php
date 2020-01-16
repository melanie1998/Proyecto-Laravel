@extends('layouts.app')

@section('content')
<style>
    body{
        background-color:lightblue;  
    }

    a:link {
        text-decoration: none ;
        color: black;
        
        }
        
        .button {
	
	--offset: 10px;
	--border-size: 2px;
	

	display: block;
	position: relative;
	padding: 1.5em 3em;
	appearance: none;
	border: 0;
	background: white;
	color: #e55743;
	text-transform: uppercase;
	letter-spacing: .25em;
	outline: none;
	cursor: pointer;
	font-weight: bold;
	border-radius: 0;
	box-shadow: inset 0 0 0 var(--border-size) currentcolor;
	transition: background .8s ease;
	
	&:hover {
		background: rgba(100, 0, 0, .03);
	}

   
</style>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <center><div style="color: #FFFFFF;
                        background: #b8b8b8;
                        text-shadow: 4px 3px 0 #7A7A7A;
                        color: #FFFFFF;
                        background: #b8b8b8;
                        font-size: 3em">ENVIAR UNA INCIDENCIA</div></center>

            </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="detallesIncidencia" method="POST" style="margin-top: 5%;">
                        @csrf
                        
                        <div class="errores"> 

                            <br>
                            <p style="background-color: aliceblue; font-size: 1.5em;">Fecha(DD/MM/YY): <input style="float:right; width:50%;" type="date" name="fechaIncidencia" value="{{ old('fechaIncidencia') }}" placeholder="fecha"></p>
                            <br>
                            <p style="background-color: aliceblue; font-size: 1.5em;">Aula: <input style="float:right;" type="text" name="aula" size="37" value="{{ old('aula') }}" placeholder="aula"></p>
                            <br>
                            <p style="background-color: aliceblue; font-size: 1.5em;">Codigo Incidencia: <select name="codigoIncidencia" style="float:right;">
                                <option selected value="{{ old('codigoIncidencia') }}"> Elige una opción </option>
                                    <option value="1">1-No se enciende la CPU</option> 
                                    <option value="2">2.No se enciende la pantalla</option> 
                                    <option value="3">3.No entra en mi sesión</option> 
                                    <option value="4">4.No navega en Internet</option> 
                                    <option value="5">5.No se oye el sonido</option> 
                                    <option value="6">6.No lee el DVD/CD</option> 
                                    <option value="7">7.Teclado roto</option> 
                                    <option value="8">8.No funciona el ratón</option> 
                                    <option value="9">9.Muy lento para entrar en la sesión</option> 
                                    <option value="10">10.(Otros) Especifica</option> 
                            </select>
                            </p>
                            <br>
                            <p style="background-color: aliceblue; font-size: 1.5em;">Especifiación: <input style="float:right;" type="text" name="especificacion" size="37" value="{{ old('especificacion') }}" placeholder="especificacion"></p>
                            <br> 
                            <p style="background-color: aliceblue; font-size: 1.5em;">Equipo afectado: <input style="float:right;" type="text" name="equipo" size="36" value="{{ old('equipo') }}" placeholder="HZxxxxxx"></p>
                        

                        
                        
                        </div>
                        <br>
                        <center>
                            <button type="submit">
                                <img src="{!! asset('crear.png') !!}" width="50px"/>
                                </button>
                        @if(count($errors))
                        <div class="errores">
                                <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach($errors->all() as $message)
                                        <li>{{$message}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        
                        
                        </div>
                        @endif
                        </form>
                   
                    </center>
                    
              
        </div>
        <a href="{{url('/home')}}" style="height: 0px;"><button class="button">Volver</button></a>
    </div>
</div>
@endsection


