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
            
                    <center><div style="color: #FFFFFF;
                        background: #b8b8b8;
                        text-shadow: 4px 3px 0 #7A7A7A;
                        color: #FFFFFF;
                        background: #b8b8b8;
                        font-size: 3em">Datos actualizados</div></center>
<br>
         
                        <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>Datos actualizados correctamente</strong>
                            </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center>
                    <table border="1px" style="text-align:center;">
                           
                                            @foreach ($datos as $key=>$value)
                                                    @if($key!='_token')
                                                <tr>
                                                        <th style="background-color:orangered; padding:10px 10px 10px 10px;">{{ $key }}</th>
                                                        <td style="background-color:white; padding:10px 10px 10px 10px; width:70%;"> {{ $value }}</td>
                                                    </tr>
                                                    @endif
                                            @endforeach
                        
                            </table>
                      
                            <br>
                            <a href="{{url('/listaIncidencia')}}" title="aceptar"><img src="{!! asset('aceptar.png') !!}" width="55px"></a>
                        </center>
               
        </div>
    </div>
</div>
@endsection
