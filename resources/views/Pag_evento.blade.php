@extends('layouts/public')

@section('content')


<div class="page_container">
				<div class="event_wrapper">
                                    
					<div class="img_event_container">
						@include('helpers/EventsImages', ['img' => $event->image])
					</div>
					<div class="cont_container">
						<h1>{{$event->nome}}</h1>
						<h4>{{$event->data}}</h4>
						<h5>{{$event->luogo}}</h5>
						<div class="accordion_container">	
							<button class="accordion_event">DESCRIZIONE EVENTO</button>
							<div class="panel_event">
							  <p>{{$event->descrizione}}</p>
							</div>
						</div>
						<div class="accordion_container">
							<button class="accordion_event">INFO LOCATION</button>
							<div class="panel_event">
                                                            <div id="googleMap" style="width:99%;height:300px; background-color:white; border:none">
                                                               <iframe src = "https://maps.google.com/maps?q={{$event->Xcord}},{{$event->Ycord}}&hl=es;z=100&amp;output=embed" style="width:100%;height:300px"></iframe>
                                                            </div>
							</div>
						</div>
						<h2>ORGANIZZATORE</h2>
						<h3>{{$event->societa}}</h3>
                                                <a href="{{route('Compra_Biglietto',[$event->eventid])}}"><button type="button" class="event_button">Compra biglietti</button></a>
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