@extends('layouts.public')
@section('title', 'Catalogo')
@section('content')

@include('layouts.ricerca')
<!--
<div id="ordina_button">
    <a> Ordina per: </a>
    <button class="btn active" onclick="">Rilevanza</button>
    <button class="btn" onclick=""> Titolo</button>
    <button class="btn" onclick=""> Data</button>
</div>
-->
<hr>

<div class="eventi_catalogo">
    <div class="grid_container">
        @isset($events)
        @forelse($events as $event)
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
        @empty
            <p class="no_events">La ricerca non ha generato risultati.</p>
        @endforelse
        </div>
        <!--Paginazione -->
            @isset($filters)
                @include('paginator/paginate', ['paginate' => $events, 'filters' => $filters])
            @endisset
            @empty($filters)
                @include('paginator/paginate', ['paginate' => $events])
            @endempty
       @endisset
       @empty($events)
            <div style="font-size:20px; text-align: center; font-weight: bold;">
            Nessun evento corrisponde ai criteri selezionati!
        </div>
       @endempty
</div>
@endsection