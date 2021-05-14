@extends('layouts/public')

@section('content')


<div class="page_container">
				<div class="event_wrapper">
                                    
					<div class="img_event_container">
						<img src="fotoevento.jpg">
					</div>
					<div class="cont_container">
						<h1>TITOLO EVENTO {{$event->nome}}</h1>
						<h4> Data evento</h4>
						<h5> Luogo evento</h5>
						<div class="accordion_container">	
							<button class="accordion_event">DESCRIZIONE EVENTO</button>
							<div class="panel_event">
							  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
						</div>
						<div class="accordion_container">
							<button class="accordion_event">INFO LOCATION</button>
							<div class="panel_event">
								<div id="googleMap" style="width:100%;height:300px; background-color:white; border-style:solid;"></div>
							</div>
						</div>
						<h2>ORGANIZZATORE</h2>
						<h3>nome organizzatore</h3>
						<button type="button" class="event_button">Compra biglietti</button>
					</div>				
				</div>
			</div>
			<script>
				//accordion
				var acc = document.getElementsByClassName("accordion_event");
				var i;

				for (i = 0; i < acc.length; i++) {
				  acc[i].addEventListener("click", function() {
					this.classList.toggle("active_event");
					var panel = this.nextElementSibling;
					if (panel.style.maxHeight) {
					  panel.style.maxHeight = null;
					} else {
					  panel.style.maxHeight = panel.scrollHeight + "px";
					} 
				  });
				}
			</script>
@endsection