@extends('layouts/public')

@section('content')

@include('layouts/ricerca')

<div id="ordina_button">
<a> Ordina per: </a>
  <button class="btn active" onclick="">Rilevanza</button>
  <button class="btn" onclick=""> Titolo</button>
  <button class="btn" onclick=""> Data</button>
</div>
<hr>
		
			<div class="home_evidenza">
				<div class="grid_container">
                                    @isset($events)
                                @foreach($events as $event)
                                <div class="event_box"><a href="{{Route('Pagina_Evento',[$event->eventid]) }}">
						<h2>Nome evento: {{$event->nome}}</h2>
						<p class="luogo_evento">Luogo dell'evento: {{$event->luogo}}</p>
						<p class="data_evento"> data evento: {{$event->data}}</p>
						<hr>
						<h5>Categoria evento</h5>
						<div class="img_container">
						<img src="fotoevento.jpg">
						</div>
                                    </a>
					</div>
                                 @endforeach
                                 @endisset
					
			</div>
                        </div>
@endsection