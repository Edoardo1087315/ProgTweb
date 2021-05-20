@extends('layouts/public')
@section('title', 'Registrati')
@section('content')
<div class="wrapper">
        <br>
        <h1> Registrati </h1>
	<div class="login_box">
                {{Form::open(array()) }}
		{{Form::label ('username', 'Username') }}
		<span><i class="fa fa-user"></i></span>
                {{Form::text('username', '',['placeholder' => 'Username...' ])}}

		{{Form::label ('password', 'Password') }}
		<span><i class="fa fa-lock"></i></span>
                {{Form::password('password', ['id' => 'pass', 'placeholder' => 'Password...' ])}}		  
		{{ Form::submit('Login') }}
                {{Form::close()}}
	</div>
	<h1> Accedi</h1>
	<div>
            <p> Sei già registrato?  </p> 
            <a href="{{ route('Accedi') }}">  Clicca qui per accedere </a>
     
	</div>
</div>

@endsection