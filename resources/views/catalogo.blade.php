@extends('layouts.public')

@section('content')

@include('layouts.ricerca')

<div id="ordina_button">
    <a> Ordina per: </a>
    <button class="btn active" onclick="">Rilevanza</button>
    <button class="btn" onclick=""> Titolo</button>
    <button class="btn" onclick=""> Data</button>
</div>
<hr>

<div class="eventi_catalogo">
    <div class="grid_container">
        @isset($events)
        @foreach($events as $event)
        <div class="event_box"><a href="{{Route('Pagina_Evento',[$event->eventid]) }}">
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
        </div>
        <!--Paginazione-->
        @include('paginator/paginate', ['paginate' => $events])

        @endisset

    
</div>
@endsection