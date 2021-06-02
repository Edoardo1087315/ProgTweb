@extends('layouts/public')
@section('title', 'FAQ')
@section('content')
@push('scripts')

<script>
    $(function () {
        /*Meccanismo accordion*/
        $(".accordion").on("click", function (){
            $(this).toggleClass("activefaq");
            /*La proprietà nextElementSibling ritorna un riferimento all'oggetto nel DOM associato all'elemento immediatamente successivo(cioè la tag) a quello su cui chiamo la proprietà */
            var panel = this.nextElementSibling;
             if (panel.style.maxHeight) {
                    /*La proprietà maxHeight è la proprietà che indica l'altezza msssima di un elemento. Se messa a null l'elemento scompare ed è come se non venisse visualizzato*/
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
        });
        var update_Faq_url= "{{ route('modificaFaq') }}";
        var update_Faq_formId = "updateForm";

        $("#updateForm").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(update_Faq_url, update_Faq_formId);
        });
        var new_Faq_url= "{{ route('newFaq') }}";
        var new_Faq_formId = "newFaqForm";
        
        $("#newFaqForm").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(new_Faq_url, new_Faq_formId);
        });

        $("#updateForm").on('submit', function (event) {
            event.preventDefault();
            doFormValidation(update_Faq_url, update_Faq_formIds);
        });
        $(".faq_button").each(function (){
                $(this).on("click",function(){
                    $("#fieldsetUpdate").show(); 
                    var risposta = $(this).prev().text();
                    var domanda = $(this).parent().prev(".accordion").text();
                    var faqId = $(this).attr("id");
                    $("#domanda").val(domanda);
                    $("#risposta").val(risposta);
                    $("#faqId").val(faqId);
            });
        });
        $("#annulla").on("click",function(){
           $("#fieldsetUpdate").hide(); 
        });
        $(".nuovaFaq_button").on("click", function(){
           $("#fieldsetUpdate").hide();
           $("#fieldsetNew").show(); 
        });
        $("#annullaNew").on("click",function(){
           $("#fieldsetNew").hide(); 
        });
    });
</script>
@endpush
<style>
    .faq_button{
    width:150px;
    height:40px;
    }
    .elimina_button{
    width:150px;
    height:40px;
    }
    .nuovaFaq_button{
    width:150px;
    height:40px;
    margin-top:3em;
    margin-bottom:3em;
    }
</style>


<div class ="wrapper">
    <h1 class="faqH1">FAQs</h1>
    @isset($faq)
    @foreach($faq as $_faq)
    <br>
    <!-- Le tag button della classe accordion devono per forz stare immediatamente prima la tag div con classe di                            stile Panel perchè il codice Javascript che implementa la comparsa dei div non riesce a farli comparire                             (deriva dall'uso della proprietà nextElementSibling)-->
    <button class="accordion">{{$_faq->Domanda}}</button>
    <div class="panel">
        <p>{{$_faq->Risposta}}</p>
        @can('isAdmin')
        <button id = "{{$_faq->faqId}}" class ="faq_button">Modifica</button>
             {{ Form::open(['route'=>'FaqToDelete',])}}
             {{ Form::hidden('faqId', $_faq->faqId , [])}}
             {{ Form::button('elimina', ['class' => 'elimina_button', 'type' => 'submit']) }}
             {{ Form::close() }}
        @endCan
    </div>
    @endforeach
    @endisset
    <button class ="nuovaFaq_button">Nuova FAQ</button>
   <fieldset id = "fieldsetUpdate" hidden>
        <legend>FAQ </legend>
    {{Form::open(array('route' => 'modificaFaq', 'id' => 'updateForm', 'class' => 'form-biglietto'))}}
    {{Form::hidden('faqId','',['id' => 'faqId'])}}
    {{Form::label('Domanda','Domanda:',[])}}
    {{Form::text('Domanda','',['id' => 'domanda'])}}
    {{Form::label('Risposta','Risposta:',[])}}
    {{Form::text('Risposta','',['id' => 'risposta'])}}
    <div class="formUtenteBottoni">
    {{Form::submit('Modifica',['id' => 'confirm'])}}
     <button type="button" id = "annulla">Annulla</button>
    {{Form::close()}}
    </div>
    </fieldset>
    <fieldset id = "fieldsetNew" hidden>
        <legend>FAQ </legend>
    {{Form::open(array('route' => 'newFaq', 'id' => 'newFaqForm', 'class' => 'form-biglietto'))}}
    {{Form::label('Domanda','Domanda:',[])}}
    {{Form::text('Domanda','',['id' => 'domanda'])}}
    {{Form::label('Risposta','Risposta:',[])}}
    {{Form::text('Risposta','',['id' => 'risposta'])}}
    <div class="formUtenteBottoni">
    {{Form::submit('Aggiungi',['id' => 'confirmNew'])}}
     <button type="button" id = "annullaNew">Annulla</button>
    {{Form::close()}}
    </div>
    </fieldset>
</div>

@endsection