{{ Form::open(array( 'id' => 'ricerca', 'files' => true, 'class' => 'form_ricerca' ,'route' => 'Ricerca')) }}
<fieldset class="form-inline">
    {{ Form::label('descrizione', 'Descrizione:') }}
    {{ Form::text('descrizione', '', ['id' => 'descrizione']) }}
    @if ($errors->first('descrizione'))
    <ul class="errors">
    @foreach ($errors->get('descrizione') as $message)
    <li>{{ $message }}</li>
    @endforeach
    </ul>
    @endif
    {{ Form::label('organizzazione', 'Organizzazione:') }}
    {{ Form::select('organizzazione', [null=>''] + array_unique($totalevents->pluck('societa','societa')->toArray()), '', ['id' => 'organizzazione']) }}
    {{ Form::label('luogo', 'Luogo:') }}
    {{ Form::select('luogo', [null=>''] + array_unique($totalevents->pluck('luogo','luogo')->toArray()), '', ['id' => 'luogo']) }}
    {{ Form::label('data', 'Quando:') }}
    {{ Form::date('data',null, ['id' => 'data']) }}
    {{ Form::submit('Cerca') }}


</fieldset>
{{ Form::close() }}