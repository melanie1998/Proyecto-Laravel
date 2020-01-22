@extends('layouts.app')

@section('content')

<style>
    body{
        background-color:#550A21; 
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
           
                    <center><div style="color: #FFFFFF;
                        background: #b8b8b8;
                        text-shadow: 4px 3px 0 #7A7A7A;
                        color: #FFFFFF;
                        background: #b8b8b8;
                        font-size: 3em">Reparación de la incidencia</div></center>

          
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                            <table style="background-color: white; text-align: left; border-collapse: collapse; width: 100%; margin-left: -18%; margin-top: 5%; border: none;">
        
                                    <style>
                
                
                                            tr:nth-child(even){
                                            background-color: #ddd;
                                            }
                
                                            tr:hover td{
                                                background-color: #F5B7B1;
                                                color: black;
                                            }
                
                                    </style>  

                                    @for($i=0; $i<count($datos); $i++)
                                        @if($i==0)
                                               
                                        <thead style="background-color: #9F818A; border-bottom: solid 5px #0F362D; color: white;">

                                            <tr>
                    
                                                @foreach(array_keys($datos[0]->toArray()) as $key)
                                                    <th style="padding: 20px;">{{ $key }} </th>
                                                @endforeach
                    
                                            </tr>

                                        </thead>

                                            <tr>
                    
                                                @foreach($datos[0]->getAttributes() as $value)
                                                    <td style="padding: 20px;">{{ $value }}</td>
                                                @endforeach
                                                                    
                                            </tr>
                                                                
                                                                
                                        @else
                                                
                                            <tr>
                    
                                                @foreach($datos[$i]->getAttributes() as $value)
                                                    <td style="padding: 20px;">{{ $value }} </td>
                                                @endforeach                                               
                                            </tr>
                                                            
                                        @endif
                    
                                    @endfor
                                                    
                                                
                                
                            </table>
                

                                    @foreach($datos as $datos)

                                        <form action="{{url('updateIncAdmin/'.$datos->profesorId)}}" method="POST" style="margin-top: 5%;">
                                            @csrf
                                            
                                    
                                            <div class="errores">
                                            
                                            
                                                
                                                
                                                <p style="background-color: #9F818A; font-size: 1.4em; color: white;">Estado de la incidencia: <select name="estado" style="float:right;">
                                                        <option selected value="{{ old('estado') }}">Elige una opcion</option>
                                                            <option value="1">recibida</option> 
                                                            <option value="2">resuelta</option> 
                                                            <option value="3">en proceso</option> 
                                                            <option value="4">rechazada</option> 
                                                        </select>
                                                    </p>                                                        
                                             <textarea rows="4" cols="55" name="comentarios" size="36" placeholder="Comentarios" value="{{ old('equipo') }}"></textarea>

                                            </div>
                                        
                                    @endforeach
                                    

                                            <br>
                                            <center>
                                                <button type="submit">
                                                    <img src="{!! asset('crear.png') !!}" width="50px"/>
                                                    </button>                       
                                            </center>
                                            
                                            <br>

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
                <br>

              
        </div>  
        <a href="{{url('/verLista')}}" style="height: 0px;"><button class="button">Volver</button></a>    
    </div>
</div>
@endsection
