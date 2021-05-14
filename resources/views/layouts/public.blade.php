<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('tWeb.css') }}" >
        <link rel="stylesheet" type = "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>ProgTweb | @yield('title', 'Catalogo')</title>
        <script>
         function myFunction (){
                  var x = document.getElementById("myTopnav");
                  if (x.className === "topnav") {
                    x.className += " responsive";
                  } else {
                    x.className = "topnav";
                  }
                }
                </script>
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