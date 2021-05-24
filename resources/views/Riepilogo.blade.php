@extends('layouts/public')
@section('title', 'Grazie per L'Acquisto')
@section('content')
<div class ="wrapper">
    <div>
        <h2>Grazie per l'acquisto!!!!!!</h2>
        <p>Ticket World è lieta di comunicarle che la sua richiesta per l'acquisto di {{$ticket->quantita}} biglietti per l'evento {{$event->nome}} che si terrà in data {{event->data}} alle ore {{$event->orario}} presso {{$event->luogo}}.</p> 
        <a href="{{Route('Pagina_Evento',[$event->eventid]) }}">Se vuole rivedere le info dell'evento clicchi qui per accedere di nuovo alla pagina dell'evento</a>
        <a href="{{Route('catalog')}}"></a>
    </div>
</div>
@endsection
