@extends('layouts/public')

@section('content')
<div class="wrapper">
        <br>
        <h1> Accedi </h1>
	<div class="login_box">
                <form action="">
			<label for="fname">Username</label>
			<span><i class="fa fa-user"></i></span>
			<input type="text" id="fname" name="firstname" placeholder="Username..">
			<label for="country">Password</label>
			<span><i class="fa fa-lock"></i></span>
                        <input type="password" id="pass" name="password"
                            		   minlength="8" required placeholder="Password..">
			  
			<input type="submit" value="Accedi">
		</form>
	</div>
	<h1> Registrati</h1>
	<div>
                <p> Sei un nuovo cliente?  </p> 
                <a href="{{ route('Registrati') }}">Clicca qui per registrarti </a>
	</div>
</div>

@endsection