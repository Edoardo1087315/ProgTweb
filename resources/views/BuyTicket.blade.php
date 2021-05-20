@extends('layouts/public')

@section('content')
       <script>
                function change(){
                    var divPag = document.getElementById("DivPag");
                    var divPayPal = document.getElementById("DivPayPal");
                    if (document.getElementById("Carta_Prepagata").selected || document.getElementById("Carta_Credito").selected){
                        divPayPal.style.display = "none";
                        divPag.style.display = "block";
                    }
                    else if(document.getElementById("PayPal").selected){
                        divPag.style.display = "none";
                        divPayPal.style.display = "block";
                    }
                    else{
                        divPag.style.display = "none";
                        divPayPal.style.display = "none";
                    }
                }
                function price(){
                    var numBiglietti = parseInt(document.getElementById("NumeroBiglietti").value);
                    var prezzo = parseFloat(document.getElementById("hiddenPriceBox").value);
                    var prezzoTotale = numBiglietti*prezzo;
                    console.log(prezzoTotale,numBiglietti,prezzo);
                    document.getElementById("priceBox").value = prezzoTotale;
                }
                    </script>
<div class = "wrapper">
            {{Form::open(['class' => 'form-biglietto'])}}
                <fieldset id="DatiEvento">
                    <legend>Dati Evento</legend>
                    {{Form::label('nome','Evento:',[])}}
                    {{Form::text('nome',$event->nome,['id' => 'inputNomeEvento', 'readonly' => true])}}
                    {{Form::label('data','Data:',[])}}
                    {{Form::date('data',$event->data,['readonly' => true])}}
                    {{Form::label('luogo','Luogo:',[])}}
                    {{Form::text('luogo',$event->nome,['id' => 'inputLuogoEvento', 'readonly' => true])}}
                </fieldset>
                <fieldset id="DatiAcquisto">
                    <legend>Dati Acquisto</legend>
                    <h3 id ="cardsLabel">Metodi di pagamento accettati</h3>
                    <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:violet;"></i>
                        <i class="fa fa-cc-paypal" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    </div>
                    {{Form::label('numbiglietti','Biglietti:',[])}}
                    {{Form::number('numbiglietti','1',['id' => 'NumeroBiglietti', 'min' => '1', 
                                   'max' => $event->bigl_tot-$event->bigl_acquis, 'step'=>'1', 'onkeydown' =>'return false','onmouseup' => 'price();' ])}}
                    {{Form::label('metodoPagamento','Metodo di Pagamento:',[])}}
                    {{Form::select('metodoPagamento', 
                            collect(array('Prepagata' => 'Carta Prepagata','PayPal' => 'PayPal','Credit' => 'Carta di credito')),
                            'Prepagata',
                            ['id' => 'metodoPagamento', 'onchange' => 'change()'],['Prepagata' => ['id' => 'Carta_Prepagata'],                                    'PayPal' => ['id' => 'PayPal'],'Credit' => ['id' => 'Carta_Credito']])}}
                    {{Form::label('priceBox','Prezzo:',[])}}
                    {{Form::text('priceBox',$event->prezzo,['id' => 'priceBox', 'disabled' => true])}}
                    {{Form::hidden('hiddenPriceBox',$event->prezzo,['id' => 'hiddenPriceBox', 'disabled' => true])}}
                    <div class ="datiPagamentoAttivo" id = "DivPag">
                    <h3>Dati di pagamento</h3>
                        <div>
                            {{Form::label('cardname','Nome sulla Carta:',[])}}
                            {{Form::text('cardname','',['id' => 'cardname', 'placeholder' => 'Il tuo Nome'])}}
                            {{Form::label('cardnumber','Numero Carta:',[])}}
                            {{Form::text('cardnumber','',['id' => 'cardnumber', 'placeholder' => '1111-2222-3333-4444'])}}
                        </div>
                        <div class = "payment">
                            <div class = "expdate">
                                {{Form::label('month','Data di Scadenza:',['class' => 'labelAcquisto'])}}
                                {{Form::selectMonth('month', null,[])}}
                                {{Form::selectRange('year', 2025, 2021, null,[])}}
                            </div>
                            <div class ="cvv">
                                {{Form::label('cvv','CVV:',["class" => "labelAcquisto"])}}
                                {{Form::text('cvv','',['id' => 'cvv'])}}
                            </div>
                        </div>
                    </div>
                    <div class ="datiPagamento" id ="DivPayPal">
                      <h3>Dati di pagamento</h3>
                      {{Form::label('EmailPayPal','Email Paypal:',[])}}
                      {{Form::text('EmailPayPal','',['id' => 'EmailPayPal', ' placeholder' => 'youremail@domain.com'])}}
                    </div>
                </fieldset>
                <div class = "formbuttons">
                    {{Form::submit('Acquista',['id' => 'submitPagamento'])}}
                    {{Form::reset('Cancella',['id' => 'resetPagamento'])}}
                </div>
            {{Form::close()}}
        </div>
 @endsection