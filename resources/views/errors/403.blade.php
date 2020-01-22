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
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center><div class="card-header">Panel de control</div></center>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>    
                            <strong>ERROR, CUENTA PROHIBIDA</strong>
                        </div>
                    <a href="{{url('/listaIncidencia')}}">VOLVER</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
