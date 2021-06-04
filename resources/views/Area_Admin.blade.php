@extends('layouts.public')
@section('title', 'Area Amministratore')
@section('content')

@push('scripts')
<script>
    $(function () {
        
        //insererimento nuova compagnia con ajax
    
        var new_company_Url = "{{ route('new_company') }}";
        var new_company_formId = 'addCompany';
        
        $("#addCompany").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(new_company_Url, new_company_formId);
        });
        
        $("form#addCompany :input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, new_company_Url, new_company_formId);
        });
        
        
         //update compagnia con ajax
        
        var update_compant_Url ="{{route('update_company')}}";
        var update_company_formId ='updateCompany';
        
        
        $("#updateCompany").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(update_compant_Url, update_company_formId);
        });
        
        $("form#updateCompany :input").on('blur', function (event) {
            var formElementId = $(this).attr('id');
            doElemValidation(formElementId, update_compant_Url, update_company_formId);
        });
        //animazione finestre, ombre ecc...
        var clienti = $('.gest-clienti');
        var organizzazione = $('.gest-organizzazioni');
        var childright = $('.float-child-right');
        var childleft = $('.float-child-left');
        var wrap = $('.wrap_admin');
        var button = $('#table_org div ');
        childleft.on('click', function () {
        if (!childleft.hasClass('active_admin')) {
        childleft.addClass('active_admin');
        childright.removeClass('active_admin');
        childright.animate({boxShadow: '2px -2px 1px 1px'}, {duration: 300});
        wrap.animate({boxShadow: '2px -2px 1px 1px'}, {duration: 300,queue: false});
        organizzazione.animate({opacity: '0%'}, {duration: 300});
        childleft.css('border-bottom', 'none');
        childright.css('border-bottom', '2px solid black');
        organizzazione.addClass('hide');
        clienti.removeClass('hide');
        childleft.animate({boxShadow: '13px -10px 5px 5px'}, {duration: 300});
        wrap.animate({boxShadow: '13px -10px 5px 5px'}, {duration: 300, queue: false});
        childleft.css({'background-color': '#FFFFFF'}, {duration: 300, queue: false});
        wrap.css({'background-color': '#FFFFFF'}, {duration: 300, queue: false});
        childright.css({'background-color': '#EEEEEE'}, {duration: 300, queue: false});
        clienti.animate({opacity: '100%'}, "slow");
        $('#aggiungiorg').hide();
        }
        });
        childright.on('click', function child() {
        if (!childright.hasClass('active_admin')) {
        childright.addClass('active_admin');
        childleft.removeClass('active_admin');
        childleft.animate({boxShadow: '2px -2px 1px 1px'}, {duration: 300});
        wrap.animate({boxShadow: '2px -2px 1px 1px'}, {duration: 300, queue: false});
        clienti.animate({opacity: '0%'}, {duration: 300});
        childright.css('border-bottom', 'none');
        childleft.css('border-bottom', '2px solid black');
        clienti.addClass('hide');
        organizzazione.removeClass('hide');
        childright.animate({boxShadow: '13px -10px 5px 5px'}, {duration: 300});
        wrap.animate({boxShadow: '13px -10px 5px 5px'}, {duration: 300, queue: false});
        childleft.css({'background-color': '#EEEEEE'}, {duration: 300, queue: false});
        wrap.css({'background-color': '#FFFFFF'}, {duration: 300, queue: false});
        childright.css({'background-color': '#FFFFFF'}, {duration: 300, queue: false});
        organizzazione.animate({opacity: '100%'}, "slow");
        }
        });
        
        $('.dettagli_company').on('click', function(){
           trigId = $(this).attr('at');
           var nome = $("#nome" + trigId).text();
           $('#dettagli_company').html(nome);
           
           
        });
        
        $('#aggiungi_areaAdmin').on('click', function(){
                $("#updateCompany :input[name=nome]").attr("id","hidden_nome");
                $("#updateCompany :input[name=email]").attr("id","hidden_email");
                $("#updateCompany :input[name=username]").attr("id","hidden_username");
                $("#updateCompany :input[name=data_nascita]").attr("id","hidden_data_nascita");
                $("#updateCompany :input[name=telefono]").attr("id","hidden_telefono");
                $("#updateCompany :input[name=sitoweb]").attr("id","hidden_sitoweb");
                $("#addCompany :input[name=nome]").attr("id","nome");
                $("#addCompany :input[name=email]").attr("id","email");
                $("#addCompany :input[name=username]").attr("id","username");
                $("#addCompany :input[name=data_nascita]").attr("id","data_nascita");
                $("#addCompany :input[name=telefono]").attr("id","telefono");
                $("#addCompany :input[name=sitoweb]").attr("id","sitoweb");
                $("#modificaorg").hide();
                $('.panel_areaAdmin').show("slow");
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                $('.errors').hide();
        });
        
        $('.modifica_button').each(function() {
            $(this).on('click', function(){
                $("#modificaorg").hide("fast");
                $('.container_aggiungi_areaAdmin').hide("slow");
                $("#modificaorg").show("slow");
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                $('.errors').hide();
                
                $("#addCompany :input[name=nome]").attr("id","hidden_nome");
                $("#addCompany :input[name=email]").attr("id","hidden_email");
                $("#addCompany :input[name=username]").attr("id","hidden_username");
                $("#addCompany :input[name=data_nascita]").attr("id","hidden_data_nascita");
                $("#addCompany :input[name=telefono]").attr("id","hidden_telefono");
                $("#addCompany :input[name=sitoweb]").attr("id","hidden_sitoweb");
                $("#updateCompany :input[name=nome]").attr("id","nome");
                $("#updateCompany :input[name=email]").attr("id","email");
                $("#updateCompany :input[name=username]").attr("id","username");
                $("#updateCompany :input[name=data_nascita]").attr("id","data_nascita");
                $("#updateCompany :input[name=telefono]").attr("id","telefono");
                $("#updateCompany :input[name=sitoweb]").attr("id","sitoweb");
                var companyid = $(this).closest('tr').find('td:eq(0)').attr('id');
                var nome = $(this).closest('tr').find('td:eq(0)').text();
                var email = $(this).closest('tr').find('td:eq(1)').text();
                var username = $(this).closest('tr').find('td:eq(2)').text();
                var data_nascita = $(this).closest('tr').find('td:eq(3)').text();
                var telefono = $(this).closest('tr').find('td:eq(4)').text();
                var sitoweb = $(this).closest('tr').find('td:eq(5)').text();
                $('#companyid').val(companyid);
                $('#nome').val(nome);
                $('#email').val(email);
                $('#username').val(username);
                $('#data_nascita').val(data_nascita);
                $('#telefono').val(telefono);
                $('#sitoweb').val(sitoweb);
            });
        });
        
        $('#annulla_update').on('click', function(){
            $("#modificaorg").hide("normal");
            $('.container_aggiungi_areaAdmin').show();
            $('.panel_areaAdmin').hide("slow");
        });
        
        $('#annulla_add').on('click', function(){
            $("#modificaorg").hide("normal");
            $('.container_aggiungi_areaAdmin').show();
            $('.panel_areaAdmin').hide("slow");
        });
        

        
});

        window.onload = function annulla(){
            $("#modificaorg").hide("normal");
            $('.container_aggiungi_areaAdmin').show();
        }
</script>
@endpush

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
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Username</th>
                <th>Data di nascita</th>
                <th>Telefono</th>
                <th>Sito Web</th>
                <th>Elimina</th>
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
                <td><div class="btn_Tab">{{Form::open(array('route' => 'delete_user','id' => 'delete_user'))}}
                        {{Form::hidden('userid', $user->id, )}}
                        {{Form::image(asset('images/Btn.png'), 'elimina', ['type'=> 'submit', 'class' => 'btn_img']) }}
                        {{Form::Close()}}</div></td>
                
                
                
                
                
            </tr>
            @endif
            @endforeach
        </table>
    </div>
    <div class="gest-organizzazioni hide">
        <div class="table-gest-organizzazioni">
        <table class="table_area_admin">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Username</th>
                <th>Data di nascita</th>
                <th>Telefono</th>
                <th>Sito Web</th>
                <th>Elimina</th>
                <th>Modifica</th>
                <th>Vendita</th>
            </tr>
            @foreach($users as $user)
            @if($user->role == ('company'))
            <tr>
                <td id="{{$user->id}}">{{$user->nome}}</td>

                <td>{{$user->email}}</td>

                <td>{{$user->username}}</td>

                <td>{{$user->data_nascita}}</td>

                <td>{{$user->telefono}}</td>

                <td>{{$user->sitoweb}}</td>

                <td><div class="btn_Tab">{{Form::open(array('route' => 'delete_user','id' => 'delete_company'))}}
                        {{Form::hidden('userid', $user->id, )}}
                        {{Form::image(asset('images/Btn.png'), 'elimina', ['type'=> 'submit', 'class' => 'btn_img']) }}
                        {{Form::Close()}}
                        </div></td>
                
                <td><div class="btn_Tab"><img src="{{ asset('images/Edit.png')}}" class="modifica_button btn_img"></div></td>
                
                
                
                <td><a class="dettagli_company" at="{{$user->id}}">Dettagli</a></td>

            </tr>
            @endif
            @endforeach
        </table>
    </div>
        <div id="dettagli_company">
                        
        </div>
        <div class="gest-organizzazioni-form ">
        <div id="modificaorg" hidden>
            <hr>
            {{Form::open(array('route' => 'update_company','class' => 'form_area_admin','id' => 'updateCompany'))}}
            {{ Form::hidden('companyid','' , [ 'id' => 'companyid']) }}
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('username', 'Username')}}
                {{Form::text('username','',['class'=> 'input', 'id' => 'hide_username' ,'disabled'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('nome', 'nome Società:')}}
                {{Form::text('nome' ,'',['class'=> 'input', 'id'=>'hide_nome'])}}
                </div>
               <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('email', 'Email Società:')}}
                {{Form::text('email','',['class'=> 'input', 'id' => 'hide_email'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('data_nascita', 'Data fondazione società')}}
                {{Form::date('data_nascita','',['class'=> 'input','id' => 'hide_data_nascita'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('telefono', 'Telefono:')}}
                {{Form::text('telefono','',['class'=> 'input', 'id' => 'hide_telefono'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('sitoweb', 'sito Web')}}
                {{Form::text('sitoweb','',['class'=> 'input', 'id' => 'hide_sitoweb'])}}
                </div>

                <div class="formUtenteBottoni">
                    {{ Form::button('<span>Conferma Modifiche</span>', ['id' => 'confirm', 'class' => 'admin_button', 'type' => 'submit']) }}
                    <button onclick="annulla();" type='button' id = "annulla_update" class ="admin_button"><span>Annulla</span></button>
                </div>
                {{Form::close()}}
        </div>
        <div class="container_aggiungi_areaAdmin">
            <button id='aggiungi_areaAdmin' class="admin_button"><span>Aggiungi Compagnia</span></button>

            <div class="panel_areaAdmin" style="display:none">
                <hr>
                {{Form::open(array('route' => 'new_company','class' => 'form_area_admin','id' => 'addCompany'))}}
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('nome', 'nome Società')}}
                {{Form::text('nome' ,'',['class'=> 'input', 'placeholder'=>'nome...', 'id'=>'nome'])}}
                </div>
               <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('email', 'Email Società:')}}
                {{Form::text('email','',['class'=> 'input', 'placeholder'=>'email...', 'id' => 'email'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('username', 'Username')}}
                {{Form::text('username','',['class'=> 'input', 'placeholder'=>'username...', 'id' => 'username'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('password', 'Password')}}
                {{Form::text('password','',['class'=> 'input', 'placeholder'=>'password...', 'id' => 'password'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('data_nascita', 'Data fondazione società')}}
                {{Form::date('data_nascita','',['class'=> 'input', 'placeholder'=>'data nascita...', 'id' => 'data_nascita'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('telefono', 'Telefono:')}}
                {{Form::text('telefono','',['class'=> 'input', 'placeholder'=>'telefono...', 'id' => 'telefono'])}}
                </div>
                <div  class="wrap-input  rs1-wrap-input">
                {{Form::label('sitoweb', 'sito Web')}}
                {{Form::text('sitoweb','',['class'=> 'input', 'placeholder'=>'sito...', 'id' => 'sitoweb'])}}
                </div>

                <div class="formUtenteBottoni">
                    {{ Form::button('<span> aggiungi </span>', ['id' => 'confirm', 'class'=>'admin_button','type' => 'submit']) }}
                    <button  type="button" id = "annulla_add" class ="admin_button"><span>Annulla</span></button>
                </div>
                {{Form::close()}}

            </div>
        </div> 
    </div>
    @endif


</div>
    
</div>

@endsection
