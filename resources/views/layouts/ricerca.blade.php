{{ Form::open(array( 'id' => 'ricerca', 'class' => 'form_ricerca' ,'route' => 'Ricerca')) }}
<fieldset class="form-inline">
    <div>
        {{ Form::label('descrizione', 'Descrizione:') }}
        {{ Form::text('descrizione', '', ['id' => 'descrizione']) }}
    </div>
    <div>
        {{ Form::label('organizzazione', 'Organizzazione:') }}
        {{ Form::select('organizzazione', [null=>''] + array_unique($totalevents->pluck('societa','societa')->toArray()), '', ['id' => 'organizzazione']) }}
    </div>
    <div>
        {{ Form::label('luogo', 'Luogo:') }}
        {{ Form::select('luogo', [null=>''] + array_unique($totalevents->pluck('luogo','luogo')->toArray()), '', ['id' => 'luogo']) }}
    </div>
    <div>
        {{ Form::label('data', 'Quando:') }}
        {{ Form::date('data',null, ['id' => 'data']) }}   
    </div>
    <div>
        {{ Form::submit('Cerca') }}
    </div>


</fieldset>
{{ Form::close() }}