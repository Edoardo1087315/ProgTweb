@extends('layouts.public')
@section('title', 'Area Amministratore')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://bitstorm.org/jquery/shadow-animation/jquery.animate-shadow-min.js"></script>

<script type="text/javascript">
$(function () {

var clienti = $('.gest-clienti');
var organizzazione = $('.gest-organizzazioni');
var childright = $('.float-child-right');
var childleft = $('.float-child-left');
var wrap = $('.wrap_admin');
var button = $('#table_org div ');
$('table tr:nth-child(even)').css('background-color', '#f9f9f9');
childleft.on('click', function () {
if (!childleft.hasClass('active_admin')) {
childleft.addClass('active_admin');
childright.removeClass('active_admin');
childright.animate({boxShadow: '2px -2px 1px 1px'}, {duration: 200});
wrap.animate({boxShadow: '2px -2px 1px 1px'}, {duration: 200, queue: false});
organizzazione.animate({opacity: '0%'}, {duration: 200});
childleft.css('border-bottom', 'none');
childright.css('border-bottom', '2px solid black');
organizzazione.addClass('hide');
clienti.removeClass('hide');
childleft.animate({boxShadow: '13px -10px 5px 5px'}, {duration: 200});
wrap.animate({boxShadow: '13px -10px 5px 5px'}, {duration: 200, queue: false});
childleft.css({'background-color': '#EEEEEE'}, {duration: 200, queue: false});
wrap.css({'background-color': '#EEEEEE'}, {duration: 200, queue: false});
childright.css({'background-color': '#FFFFFF'}, {duration: 200, queue: false});
clienti.animate({opacity: '100%'}, "slow");
$('#aggiungiorg').hide();
}

})

        childright.on('click', function () {
        if (!childright.hasClass('active_admin')) {
        childright.addClass('active_admin');
        childleft.removeClass('active_admin');
        childleft.animate({boxShadow: '2px -2px 1px 1px'}, {duration: 200});
        wrap.animate({boxShadow: '2px -2px 1px 1px'}, {duration: 200, queue: false});
        clienti.animate({opacity: '0%'}, {duration: 200});
        childright.css('border-bottom', 'none');
        childleft.css('border-bottom', '2px solid black');
        clienti.addClass('hide');
        organizzazione.removeClass('hide');
        childright.animate({boxShadow: '13px -10px 5px 5px'}, {duration: 200});
        wrap.animate({boxShadow: '13px -10px 5px 5px'}, {duration: 200, queue: false});
        childleft.css({'background-color': '#FFFFFF'}, {duration: 200, queue: false});
        wrap.css({'background-color': '#EEEEEE'}, {duration: 200, queue: false});
        childright.css({'background-color': '#EEEEEE'}, {duration: 200, queue: false});
        organizzazione.animate({opacity: '100%'}, "slow");
        }
        })


});
</script>
</head>

@isset($users)
<div class="float-container">

    <div class="float-child-left active_admin">
        <h2>gestione clienti</h2>
    </div>
    <div class="float-child-right"">
        <h2>gestione organizzazioni</h2>
    </div>
</div>
<div class="wrap_admin">
    <div class="gest-clienti">
        <table class="table_area_admin">
            <tr>
                <th>Nome</th><th>Cognome</th><th>Email</th><th>Username</th><th>Data di nascita</th><th>Telefono</th><th>Sito Web</th><th>Elimina</th>
            </tr>
            @foreach($users as $user)
            @if($user->role == ('user'))
            <tr>
                <td>{{$user->nome}}</td>
                <td>{{$user->cognome}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->data_nascita}}</td>
                <td>{{$user->telefono}}</td>
                <td>{{$user->sito}}</td>
                <td><a href="{{route('delete_user',[$user->id])}}">Delete</a></td>
            </tr>
            @endif
            @endforeach

        </table>

    </div>
    <div class="gest-organizzazioni hide">
        <table class="table_area_admin">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Username</th>
                <th>Data di nascita</th>
                <th>Telefono</th>
                <th>Sito Web</th>
                <th>elimina</th>
                <th>modifica</th>
            </tr>
            @foreach($users as $user)
            @if($user->role == ('company'))

            <tr>
                <td>{{$user->nome}}</td>

                <td>{{$user->email}}</td>

                <td>{{$user->username}}</td>

                <td>{{$user->data_nascita}}</td>

                <td>{{$user->telefono}}</td>

                <td>{{$user->sitoweb}}</td>

                <td> <a href="{{Route('company_to_delete',[$user->id]) }}">Delete</a></td>

                <td><a href="{{Route('company_to_update',[$user->id])}}">Update</a></td>

            </tr>
            @endif
            @endforeach
        </table>


        @if(@isset($selected_company))
        <div id="modificaorg" class="">
            <hr>
            {{Form::open(['route' => 'update_company','class=form-biglietto'])}}
            {{ Form::hidden('companyid', $selected_company->id , [ 'id' => 'companyid']) }}

            {{Form::label('nome', 'nome Società:')}}
            {{Form::text('nome' ,$selected_company->nome,['class'=>'input','id'=> 'nome'])}}
            @if ($errors->first('nome'))
            <ul class="errors">
                @foreach ($errors->get('nome') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{Form::label('email', 'Email Società:')}}
            {{Form::text('email',$selected_company->email,['class'=>'input','id'=> 'email'])}}
            @if ($errors->first('email'))
            <ul class="errors">
                @foreach ($errors->get('email') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{Form::label('username', 'Username:')}}
            {{Form::text('username',$selected_company->username,['class'=>'input','id'=> 'username'])}}
            @if ($errors->first('username'))
            <ul class="errors">
                @foreach ($errors->get('username') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{Form::label('data_nascita', 'Data fondazione società:')}}
            {{Form::date('data_nascita',$selected_company->data_nascita,['class'=>'input','id'=> 'data'])}}
            @if ($errors->first('data_nascita'))
            <ul class="errors">
                @foreach ($errors->get('data_nascita') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{Form::label('telefono', 'Telefono:')}}
            {{Form::text('telefono',$selected_company->telefono,['class'=>'input','id'=> 'telefono'])}}
            @if ($errors->first('telefono'))
            <ul class="errors">
                @foreach ($errors->get('telefono') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
            {{Form::label('sitoweb', 'sito Web:')}}
            {{Form::text('sitoweb',$selected_company->sitoweb,['class'=>'input','id'=> 'sitoweb'])}}
            @if ($errors->first('sitoweb'))
            <ul class="errors">
                @foreach ($errors->get('sitoweb') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif

            <div class="formUtenteBottoni">
                {{ Form::submit('Conferma Modifiche', ['id' => 'confirm']) }}
                <button onclick="location.href ='{{ route('Area_Admin') }}'" type="button" id = "annulla" class ="event_button">Annulla</button>
            </div>
            {{Form::close()}}
        </div>
        @else
        <hr>

        <div class="accordion_container_areaOrg">
            <button class="accordion_areaOrg">Aggiungi Compagnia</button>

            <div class="panel_areaOrg">
                <hr>
                {{Form::open(['route' => 'new_company','class=form-biglietto'])}}

                {{Form::label('nome', 'nome Società')}}
                {{Form::text('nome' ,'',['placeholder'=>'nome...'])}}
                @if ($errors->first('nome'))
                <ul class="errors">
                    @foreach ($errors->get('nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label('email', 'Email Società:')}}
                {{Form::text('email','',['placeholder'=>'email...'])}}
                @if ($errors->first('email'))
                <ul class="errors">
                    @foreach ($errors->get('email') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label('username', 'Username')}}
                {{Form::text('username','',['placeholder'=>'username...'])}}
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label('password', 'Password')}}
                {{Form::text('password','',['placeholder'=>'password...'])}}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label('data_nascita', 'Data fondazione società')}}
                {{Form::date('data_nascita','',['placeholder'=>'data nascita...'])}}
                @if ($errors->first('data_nascita'))
                <ul class="errors">
                    @foreach ($errors->get('data_nascita') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label('telefono', 'Telefono:')}}
                {{Form::text('telefono','',['placeholder'=>'telefono...'])}}
                @if ($errors->first('telefono'))
                <ul class="errors">
                    @foreach ($errors->get('telefono') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                {{Form::label('sitoweb', 'sito Web')}}
                {{Form::text('sitoweb','',['placeholder'=>'sito...'])}}
                @if ($errors->first('sitoweb'))
                <ul class="errors">
                    @foreach ($errors->get('sitoweb') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="formUtenteBottoni">
                    {{ Form::submit('aggiungi', ['id' => 'confirm']) }}
                    <button onclick="location.href ='{{ route('Area_Admin') }}'" type="button" id = "annulla" class ="event_button">Annulla</button>
                </div>
                {{Form::close()}}

            </div>
        </div> 
    </div>
    @endif

    @endisset

</div>

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