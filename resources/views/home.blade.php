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
	width: 60%;
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

    #demotext {
color: #FFFFFF;
background: #b8b8b8;
text-shadow: 4px 3px 0 #7A7A7A;
color: #FFFFFF;
background: #b8b8b8;
}
	
	
	
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
                    font-size: 3em">Panel de control</div></center>

<br>
                <div class="card-body" style="background-color: white">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <center>
                    <a href="{{url('/listaIncidencia')}}" style="height: 0px;"><button class="button">Ver lista incidencias</button></a>
                    <br>
                    </center>
                </div>
          
        </div>
    </div>
</div>
@endsection
