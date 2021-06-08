@extends('layouts.public')
@section('title', 'Area Amministratore')
@section('content')

@push('scripts')
<script>
//update compagnia con ajax
     $(function () {
        var update_compant_Url = "{{route('update_company',[$company->id])}}";
        var update_company_formId = 'updateCompany';

        $("#updateCompany").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(update_compant_Url, update_company_formId);
        });
        $("form#updateCompany :input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, update_compant_Url, update_company_formId);
        });
    });
</script>
@endpush
<div class ="wrapper"> 
    <h2>Modifica Dati: {{$company->nome}}</h2>
{{Form::open(array('route' => array('update_company',$company->id),'class' => 'form_area_admin','id' => 'updateCompany'))}}
{{ Form::hidden('companyid',$company->id , [ 'id' => 'companyid']) }}
<div>
    {{Form::label('username', 'Username')}}
    {{Form::text('username',$company->username,['class'=> 'input', 'id' => 'username' ,'disabled'])}}
</div>
<div>
    {{Form::label('nome', 'nome Società:')}}
    {{Form::text('nome' ,$company->nome,['class'=> 'input', 'id'=>'nome'])}}
</div>
<div>
    {{Form::label('email', 'Email Società:')}}
    {{Form::text('email',$company->email,['class'=> 'input', 'id' => 'email'])}}
</div>
<div>
    {{Form::label('data_nascita', 'Data fondazione società')}}
    {{Form::date('data_nascita',$company->data_nascita,['class'=> 'input','id' => 'data_nascita'])}}
</div>
<div>
    {{Form::label('telefono', 'Telefono:')}}
    {{Form::text('telefono',$company->telefono,['class'=> 'input', 'id' => 'telefono'])}}
</div>
<div>
    {{Form::label('sitoweb', 'sito Web')}}
    {{Form::text('sitoweb',$company->sitoweb,['class'=> 'input', 'id' => 'sitoweb'])}}
</div>
<div class="formUtenteBottoni">
                    {{ Form::button('<span>Conferma Modifiche</span>', ['id' => 'confirm', 'class' => 'admin_button', 'type' => 'submit']) }}
                    <a href = "{{route('Area_Admin')}}"><button type='button' id = "annulla_update" class ="admin_button"><span>Annulla</span></button></a>
                </div>
                {{Form::close()}}
</div>
@endsection