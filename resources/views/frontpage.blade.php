@extends('layouts.public')		

@section('title', 'Home')
@section('content')
<div class="home_evidenza">
    <h1>Non perdere i prossimi eventi!</h1>
    <div class="grid_container">
        @isset($events)
        @foreach($events as $event)
        <div class="event_box">
            <a href="{{Route('Pagina_Evento',[$event->eventid]) }}">		
                <h2>{{$event->nome}}</h2>
                <p class="luogo_evento">{{$event->luogo}}</p>
                <p class="data_evento">{{$event->data}}</p>
                <hr>
                <h5>{{$event->categoria}}</h5>
                <div class="img_container">
                    @include('helpers/EventsImages', ['img' => $event->image])
                </div>
                </a>
        </div>
        @endforeach
        @endisset
    </div>			
</div>
<div class="home_scopri">
    <h1>Scopri</h1>
    <div class="grid_container">
        <div class="event_box">			
            <h2>Nome evento</h2>
            <p class="luogo_evento">Luogo dell'evento</p>
            <p class="data_evento"> data evento</p>
            <hr>
            <h5>Categoria evento</h5>
            <div class="img_container">
                <img src="fotoevento.jpg">
            </div>
        </div>
        <div class="event_box">			
            <h2>Nome evento</h2>
            <p class="luogo_evento">Luogo dell'evento</p>
            <p class="data_evento"> data evento</p>
            <hr>
            <h5>Categoria evento</h5>
            <div class="img_container">
                <img src="fotoevento.jpg">
            </div>
        </div>
        <div class="event_box">			
            <h2>Nome evento</h2>
            <p class="luogo_evento">Luogo dell'evento</p>
            <p class="data_evento"> data evento</p>
            <hr>
            <h5>Categoria evento</h5>
            <div class="img_container">
                <img src="fotoevento.jpg">
            </div>
        </div>	
        <div class="event_box">			
            <h2>Nome evento</h2>
            <p class="luogo_evento">Luogo dell'evento</p>
            <p class="data_evento"> data evento</p>
            <hr>
            <h5>Categoria evento</h5>
            <div class="img_container">
                <img src="fotoevento.jpg">
            </div>
        </div>	
        <div class="event_box">			
            <h2>Nome evento</h2>
            <p class="luogo_evento">Luogo dell'evento</p>
            <p class="data_evento"> data evento</p>
            <hr>
            <h5>Categoria evento</h5>
            <div class="img_container">
                <img src="fotoevento.jpg">
            </div>
        </div>
    </div>
</div>		
@endsection