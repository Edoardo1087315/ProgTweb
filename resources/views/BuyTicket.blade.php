@extends('layouts/public')

@section('content')

<div class = "wrapper">
            <form class ="form-biglietto">
                <fieldset id="DatiEvento">
                    <legend>Dati Evento</legend>
                    <label>Evento:
                        <input type="text" name="nome" value="{{$event->nome}}" id="inputNomeEvento" readonly>
                    </label>
                    <label>Data:
                        <input type="date" name="data" value="{{$event->data}}" readonly >
                    </label>  
                    <label>Luogo:
                        <input type="text" name="luogo" value="{{$event->luogo}}" id="inputLuogoEvento" readonly >
                    </label>
                </fieldset>
                <fieldset id="DatiAcquisto">
                    <legend>Dati Acquisto</legend>
                    <label id ="cardsLabel">Metodi di pagamento accettati</label>
                    <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:violet;"></i>
                        <i class="fa fa-cc-paypal" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    </div>
                    <label>Biglietti:
                        <input type="number" name="numbiglietti" id="NumeroBiglietti" min="1" max="8" step="1" value="1" onkeydown="return false" onmouseup="price();">
                    </label>
                    <label> Metodo di Pagamento:
                        <select name="metodoPagamento" id ="metodoPagamento" onchange="change()">
                            <option id ="Carta_Prepagata" value="Prepagata" selected>Carta Prepagata</option>
                            <option id ="PayPal" value="PayPal">PayPal</option>
                            <option id ="Carta_Credito" value="Credit">Carta di Credito </option>
                        </select>
                    </label>
                    <label>Prezzo:
                        <input type="text" id="priceBox" value ="{{$event->prezzo}}" disabled>
                    </label>
                        <input type="hidden" id="hiddenPriceBox" value ="{{$event->prezzo}}" disabled>
                    <div class ="datiPagamentoAttivo" id = "DivPag">
                    <h3>Dati di pagamento</h3>
                        <div class="card">
                            <label>Nome sulla Carta:
                                <input type="text" id="cname" name="cardname" placeholder="Il tuo Nome">
                            </label>
                            <label>Numero Carta:
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            </label>
                        </div>
                        <div class = "payment">
                            <label>Data di Scadenza:
                                <input type="month" id="expdate" name="expdate" value="2021-03" min="2021-01">
                            </label>
                            <label>CVV:
                                <input type="text" id="cvv" name="cvv" >
                            </label>
                        </div>
                    </div>
                    <div class ="datiPagamento" id ="DivPayPal">
                      <h3>Dati di pagamento</h3>
                       <label>Email Paypal:
                                <input type="text" id="EmailPayPal" name="EmailPayPal" placeholder="youremail@domain.com">
                       </label>
                    </div>
                </fieldset>
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
                <div class = "formbuttons">
                    <input type="submit" id="submitPagamento" value="Acquista">
                    <input type="reset"  id="resetPagamento" value="Cancella">
                </div>
            </form>
        </div>
@endSection