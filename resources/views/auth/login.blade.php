@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center><div style="color: #FFFFFF;
                    background: #b8b8b8;
                    text-shadow: 4px 3px 0 #7A7A7A;
                    color: #FFFFFF;
                    background: #b8b8b8;
                    font-size: 3em">LOGIN</div></center>

            
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                                <a href="{{ url('/redirect') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                                    <strong>Login con <img src="{!! asset('google.webp') !!}" width="50px"></strong>
                                    <iframe id="idlogoutframe" src="https:\\accounts.google.com/logout" style="display:none"></iframe>
                                  </a> 

                   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
