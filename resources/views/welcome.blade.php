<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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
	
	
	
}

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div style="text-shadow: 4px 3px 0 #7A7A7A; color: #FFFFFF;background:indianred;font-size: 3em">MENÚ PRINCIPAL</div>
                    <div class="links">
                            @if (Route::has('login'))
             
                              @auth
                              <div style="color: #FFFFFF;
                                background: #b8b8b8;
                                text-shadow: 4px 3px 0 #7A7A7A;
                                color: #FFFFFF;
                                background: #b8b8b8;
                                font-size: 3em">PANEL DE CONTROL</div>
                                    <a href="{{ url('/home') }}" title="Panel de control"><img src="{!! asset('panelcontrol.png') !!}" width="200px"></a>
                              @else
                                    <p style="font-size: 1.5em;">Profesor/a
                                    <a href="{{ route('login') }}" title="Profesor/a"><img src="{!! asset('profesor.png') !!}" width="200px"></a></p>
                                    <p style="font-size: 1.5em;">Adminsitrador/a
                                    <a href="{{ route('login') }}" title="Administrador/a"><img src="{!! asset('admin.png') !!}" width="200px"></a></p>
                       
                                @endauth
                
                            @endif

                        </div>
               
            </div>
        </div>
    </body>
</html>
