@extends('layouts.public')	
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
<script type="text/javascript">
$(function(){
    var values = [];
    $('#DatiUtente input[type != submit]').each(function(i){
        values.push(this.value);
    });
    $('#modify').on("click",function(){
       $('#DatiUtente input').removeAttr('readonly');
       $('#modify').hide();
       $('#confirm').show();
       $('#annulla').show();
    });
    $('#annulla').on("click",function(){
       $('#DatiUtente input[type != submit]').each(function(i){
           this.value = values[i];
           this.innerHTML = values[i];
       });
       $('#DatiUtente input[type != submit]').attr('readonly','true');
       $('#modify').show();
       $('#confirm').hide();
       $('#annulla').hide();
    });
});
</script>
@endpush
@section('title', 'Area Personale')
@section('content')

<div class="wrapper">
    <h2>Dati Personali</h2>
    {{Form::open(array('route'  => array('Modifica_Utente',$user), 'id' => 'DatiUtente','class' => 'formUtente')) }}
                {{Form::label ('nome', 'Nome') }}
                {{Form::text('nome', $user->nome,['id' => 'nome', 'readonly' => 'true' ])}}
                 @if ($errors->first('nome'))
                <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label ('cognome', 'Cognome') }}
                {{Form::text('cognome', $user->cognome,['id' => 'cognome', 'readonly' => 'true' ])}}
                 @if ($errors->first('cognome'))
                <ul class="errors">
                    @foreach ($errors->get('cognome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label ('data_nascita', 'Data di nascita') }}
                {{Form::date('data_nascita', $user->data_nascita,['id' => 'data_nascita','readonly' => 'true'])}}
                 @if ($errors->first('data_nascita'))
                <ul class="errors">
                    @foreach ($errors->get('data_nascita') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label ('telefono', 'Numero di Telefono') }}
                {{Form::text('telefono', $user->telefono,['id' => 'telefono','readonly' => 'true'])}}
                 @if ($errors->first('telefono'))
                <ul class="errors">
                    @foreach ($errors->get('telefono') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label ('email', 'Email') }}
                {{Form::email('email', $user->email,['id' => 'email' , 'readonly' => 'true' ])}}
                 @if ($errors->first('email'))
                <ul class="errors">
                    @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
		{{Form::label ('username', 'Username') }}
                {{Form::text('username', $user->username,['id' => 'username','disabled' => 'true'])}}
                 @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="formUtenteBottoni">
		{{Form::submit('Conferma',['id' => 'confirm', 'hidden' => 'true']) }}
                <button type="button" id = "annulla" class ="event_button" hidden>Annulla</button>
                </div>
                {{Form::close()}}
    <div class ="riep_buttons">
       <button type="button" id = "modify" class ="event_button">Modifica Dati</button>
       <a href="{{ route('Storico',[$user]) }}"><button type="button" class ="event_button">Storico Biglietti</button></a>
    </div>
</div>
@endsection