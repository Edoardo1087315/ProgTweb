<script>
                function myFunction() {
                  var x = document.getElementById("myTopnav");
                  if (x.className === "topnav") {
                    x.className += " responsive";
                  } else {
                    x.className = "topnav";
                  }
                }
                </script>
    
<a href="{{ route('frontpage') }}" class="active" id="home">Home</a>
<a href="{{ route('catalog') }}" onclick="class" id="catalogo">Catalogo</a>
			
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
