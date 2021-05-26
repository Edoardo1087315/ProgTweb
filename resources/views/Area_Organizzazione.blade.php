@extends('layouts.public')
@section('title', 'Area organizzatore')
@section('content')


@isset($events)

<div class="wrapper">
    <br>
    <h1>Area Organizzatore: {{ Auth::user()->nome }}</h1>
    <hr>

    <table class="events_Tab">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Luogo</th>
            <th>Società</th>
            <th>Biglietti totali</th>
            <th>Biglietti acquistati</th>
            <th>Prezzo</th>
            <th></th>

        </tr>
        @foreach($events as $event)

        <tr>
            <td>{{$event->eventid}}</td>
            <td><strong> <a href="{{Route('Pagina_Evento',[$event->eventid]) }}">{{$event->nome}} </a></strong></td>
            <td>{{$event->luogo}}</td>
            <td>{{$event->societa}}</td>
            <td>{{$event->bigl_tot}}</td>
            <td>{{$event->bigl_acquis}}</td>
            <td>{{$event->prezzo}}</td>
            <td><a href="{{Route('getEventToUpdate',[$event->eventid]) }}">Update</a> <a href="{{Route('deleteEvent',[$event->eventid]) }}">Delete</a></td>
        </tr>

        @endforeach
    </table>
    <hr>

    
    @if(@isset($selected_event))

    <div class="accordion_container_areaOrg">
        <button class="accordion_areaOrg">Modifica Evento: {{$selected_event->eventid}}</button>
        <div class="panel_areaOrg">
            {{ Form::open(array('route'=>'updateEvent','id' => 'addevent', 'files' => true,'class' => 'form-biglietto')) }}
            {{ Form::hidden('eventid', $selected_event->eventid , [ 'id' => 'eventid']) }}
             
            {{ Form::label('nome', 'Nome Evento', ['class' => 'label-input']) }}
            {{ Form::text('nome', $selected_event->nome, ['class' => 'input', 'id' => 'nome']) }}
            @if ($errors->first('nome'))
            <ul class="errors">
                @foreach ($errors->get('nome') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif


            {{ Form::label('prezzo', 'Prezzo') }}
            {{ Form::text('prezzo', $selected_event->prezzo, [ 'id' => 'prezzo']) }}
            @if ($errors->first('prezzo'))
            <ul class="errors">
                @foreach ($errors->get('prezzo') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('societa', 'Società') }}
            {{ Form::text('societa',Auth::user()->nome, ['id' => 'societa', 'readonly'] ) }}
            @if ($errors->first('societa'))
            <ul class="errors">
                @foreach ($errors->get('societa') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('luogo', 'Luogo') }}
            {{ Form::text('luogo', $selected_event->luogo, [ 'id' => 'luogo']) }}
            @if ($errors->first('luogo'))
            <ul class="errors">
                @foreach ($errors->get('luogo') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('bigl_tot', 'Biglietti totali') }}
            {{ Form::text('bigl_tot', $selected_event->bigl_tot, [ 'id' => 'bigl_tot']) }}
            @if ($errors->first('bigl_tot'))
            <ul class="errors">
                @foreach ($errors->get('bigl_tot') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('bigl_acquis', 'Biglietti acquistati') }}
            {{ Form::text('bigl_acquis', $selected_event->bigl_acquis, [ 'id' => 'bigl_acquis']) }}
            {{ Form::label('categoria', 'Categoria') }}
            {{ Form::text('categoria', $selected_event->categoria, [ 'id' => 'categoria']) }}
            @if ($errors->first('categoria'))
            <ul class="errors">
                @foreach ($errors->get('categoria') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('Ycord', 'Ycord') }}
            {{ Form::text('Ycord', $selected_event->Ycord, [ 'id' => 'Ycord']) }}
            @if ($errors->first('Ycord'))
            <ul class="errors">
                @foreach ($errors->get('Ycord') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('Xcord', 'Xcord') }}
            {{ Form::text('Xcord', $selected_event->Xcord, [ 'id' => 'Xcord']) }}
            @if ($errors->first('Xcord'))
            <ul class="errors">
                @foreach ($errors->get('Xcord') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('descrizione', 'Descrizione') }}
            {{ Form::text('descrizione', $selected_event->descrizione, ['id' => 'descrizione']) }}
            @if ($errors->first('descrizione'))
            <ul class="errors">
                @foreach ($errors->get('descrizione') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('programma', 'Programma') }}
            {{ Form::text('programma', $selected_event->programma, [ 'id' => 'programma', 'rows'=>4]) }}
            @if ($errors->first('programma'))
            <ul class="errors">
                @foreach ($errors->get('programma') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{ Form::label('data', 'Data') }}
            {{ Form::date('data',$selected_event->data, ['id' => 'data']) }}
            {{ Form::label('orario', 'Orario') }}
            {{ Form::time('orario',$selected_event->orario, ['id' => 'data']) }}
            {{ Form::label('image', 'Immagine') }}
            {{ Form::file('image', [ 'id' => 'image']) }}
            {{ Form::hidden('image_path', $selected_event->image , [ 'id' => 'image']) }}

            <div class="container-form-btn">
                {{ Form::submit('Modifica Evento', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
            </div>

            {{ Form::close() }}

        </div>
    </div>
    @else
    
    <div class="accordion_container_areaOrg">
        <button class="accordion_areaOrg">Aggiungi Evento</button>
        <div class="panel_areaOrg">
            {{ Form::open(array('route'=>'store_event','id' => 'addevent', 'files' => true,'class' => 'form-biglietto')) }}

        {{ Form::label('nome', 'Nome Evento', ['class' => 'label-input']) }}
        {{ Form::text('nome', '', ['class' => 'input', 'id' => 'nome']) }}
        @if ($errors->first('nome'))
        <ul class="errors">
            @foreach ($errors->get('nome') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif


        {{ Form::label('prezzo', 'Prezzo') }}
        {{ Form::text('prezzo', '', [ 'id' => 'prezzo']) }}
        @if ($errors->first('prezzo'))
        <ul class="errors">
            @foreach ($errors->get('prezzo') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        {{ Form::label('societa', 'Società') }}
        {{ Form::text('societa',Auth::user()->nome, ['id' => 'societa', 'readonly'] ) }}
        @if ($errors->first('societa'))
        <ul class="errors">
            @foreach ($errors->get('societa') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        {{ Form::label('luogo', 'Luogo') }}
        {{ Form::text('luogo', '', [ 'id' => 'luogo']) }}
        @if ($errors->first('luogo'))
        <ul class="errors">
            @foreach ($errors->get('luogo') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        {{ Form::label('bigl_tot', 'Biglietti totali') }}
        {{ Form::text('bigl_tot', '', [ 'id' => 'bigl_tot']) }}
        @if ($errors->first('bigl_tot'))
        <ul class="errors">
            @foreach ($errors->get('bigl_tot') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

        {{ Form::hidden('bigl_acquis', 0, [ 'id' => 'bigl_acquis']) }}
        {{ Form::label('categoria', 'Categoria') }}
        {{ Form::text('categoria', '', [ 'id' => 'categoria']) }}
        @if ($errors->first('categoria'))
        <ul class="errors">
            @foreach ($errors->get('categoria') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        {{ Form::label('Ycord', 'Ycord') }}
        {{ Form::text('Ycord', '', [ 'id' => 'Ycord']) }}
        @if ($errors->first('Ycord'))
        <ul class="errors">
            @foreach ($errors->get('Ycord') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        {{ Form::label('Xcord', 'Xcord') }}
        {{ Form::text('Xcord', '', [ 'id' => 'Xcord']) }}
        @if ($errors->first('Xcord'))
        <ul class="errors">
            @foreach ($errors->get('Xcord') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        {{ Form::label('descrizione', 'Descrizione') }}
        {{ Form::text('descrizione', '', ['id' => 'descrizione']) }}
        @if ($errors->first('descrizione'))
        <ul class="errors">
            @foreach ($errors->get('descrizione') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        {{ Form::label('programma', 'Programma') }}
        {{ Form::text('programma', '', [ 'id' => 'programma', 'rows'=>4]) }}
        @if ($errors->first('programma'))
        <ul class="errors">
            @foreach ($errors->get('programma') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
        {{ Form::label('data', 'Data') }}
        {{ Form::date('data',\Carbon\Carbon::now(), ['id' => 'data']) }}
        {{ Form::label('orario', 'Orario') }}
        {{ Form::time('orario',\Carbon\Carbon::now() , ['id' => 'data']) }}
        {{ Form::label('image', 'Immagine') }}
        {{ Form::file('image', [ 'id' => 'image']) }}


        <div class="container-form-btn">
            {{ Form::submit('Aggiungi Evento', ['class' => 'form-btn1', 'id' => 'sub-btn']) }}
        </div>

        {{ Form::close() }}
            
        </div>
        
    </div>

    @endif
    
  
</div>
@endisset  





<script>
    //accordion
    var acc = document.getElementsByClassName("accordion_areaOrg");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active_areaOrg");
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