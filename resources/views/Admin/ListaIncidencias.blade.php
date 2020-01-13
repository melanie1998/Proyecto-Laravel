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
	background: transparent;
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
            
                
                <center>
                    <div style="color: #FFFFFF;background: #b8b8b8;text-shadow: 4px 3px 0 #7A7A7A;olor: #FFFFFF;ckground: #b8b8b8;font-size: 3em">
                        LISTA DE INCIDENCIAS
                    </div>
                </center>

              <br>
             
                    @include('flash-message')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table style="background-color: white; text-align: left; border-collapse: collapse; width: 100%; margin-left: -30%; margin-top: 5%; border: none;">
   
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
                                    <th style="padding: 20px;">Modificar</th>
                                    <th style="padding: 20px;">Detalles</th>
                                </tr>
                            </thead>

                                <tr>
                                    @foreach($datos[0]->getAttributes() as $value)
                                        <td style="padding: 20px;">{{ $value }}</td>
                                    @endforeach
                                        <td style="padding: 20px;"><a href="/modificarIncAdmin/{{$datos[0]->getAttribute('id')}}" title="modificar"><img src="{!! asset('modificar.png') !!}" width="50px"></td></a>
                                        <td style="padding: 20px;"><a href="/consultaIncAdmin/{{$datos[0]->getAttribute('id')}}" title="ver detalles"><img src="{!! asset('detalles.png') !!}" width="50px"></a></td>

                                </tr>
                                
                                
                            @else
                                <tr>
                                    @foreach($datos[$i]->getAttributes() as $value)
                                        <td style="border: medium solid black; padding:15px 15px 15px 15px;">{{ $value }} </td>
                                    @endforeach
                                    <td style="border: medium solid black; padding:15px 15px 15px 15px;"><a href="/modificarIncAdmin/{{$datos[$i]->getAttribute('id')}}" title="modificar"><img src="{!! asset('modificar.png') !!}" width="50px"></td></a>
                                    <td style="border: medium solid black; padding:15px 15px 15px 15px;"><a href="/consultaIncAdmin/{{$datos[0]->getAttribute('id')}}" title="ver detalles"><img src="{!! asset('detalles.png') !!}" width="50px"></a></td>

                                </tr>
                               
                            @endif
                        @endfor
                       
                    </table>
                    <br>
                 
                  
              
        </div>
        <a href="{{url('/home/admin')}}"><button class="button" style="background-color: white;">Volver</button></a>
    </div>
</div>
@endsection
