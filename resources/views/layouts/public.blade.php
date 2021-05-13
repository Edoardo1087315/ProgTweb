<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('tWeb.css') }}" >
        <title>ProgTweb | @yield('title', 'Catalogo')</title>
    </head>
     <body>
		<div class="header">
			<div class="logo">
				<img src="{{ asset('images/logo.png') }}" alt="logo" class="img_logo"/>
			</div>
			<div class="login_signup">
			<a>Accedi</a>
			/
			<a>Registrati</a>
			</div>				
		</div>
		<div class="topnav" id="myTopnav">
			@include('layouts/topnav')
		</div>
                    <section id="content">
                       @yield('content')
                    </section>    
                       <div class="footer">
            @include('layouts/footer')
        </div>
</html>