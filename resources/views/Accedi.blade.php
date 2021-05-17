<script>
    window.onload = function(){
        // Get the input field
        var input = document.getElementById("pass");

        // Get the warning text
        var text = document.getElementById("text");

        // When the user presses any key on the keyboard, run the function
        input.addEventListener("keyup", function(event) {

        // If "caps lock" is pressed, display the warning text
        if (event.getModifierState("CapsLock")) {
                text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    });
};

</script>
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