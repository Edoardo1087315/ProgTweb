@extends('layouts/public')
@section('title', 'FAQ')
@section('content')
<script>
window.onload = function() {
                //metodo che prende tutti gli elementi con classe di stile accordione e li mette nell'array faq di oggetti
                var faq = document.getElementsByClassName("accordion");
                    for (var i = 0; i < faq.length; i++) {
                        /*aggiunge un listener di evento click all'elemento i-esimo del vettore faq. il primo parametro è il tipo                             di listener da aggiungere. Il secondo è una funzione lambda che determina cosa succede al verificarsi                               dell'evento*/
                        faq[i].addEventListener("click", function() {
                            /*this è riferito all'elemento i-esimo di faq.La proprietà classList è una proprietà solo leggibile                                   che ritorna un elemento di tipo DOMTokenList che è una collection che raccoglie tutti gli attributi                                 class che indicano le classi di stile applicate all'elemento. Il metodo toggle aggiunge a questa                                    collection la classe di stile che gli passo come parametro se tale classe non è già dentro la                                       collection e rimuove invece la classe di stile se essa è già presente*/
                            this.classList.toggle("activefaq");

                            /* La proprietà nextElementSibling ritorna un riferimento all'oggetto nel DOM associato all'elemento                                 immediatamente successivo(cioè la tag) a quello su cui chiamo la proprietà */
                            var panel = this.nextElementSibling;
                              if (panel.style.maxHeight) { 
                                  /*La proprietà maxHeight è la proprietà che indica l'altezza msssima di un elemento. Se messa a                                       null l'elemento scompare ed è come se non venisse visualizzato*/
                                  panel.style.maxHeight = null;
                              } else {
                                  panel.style.maxHeight = panel.scrollHeight + "px";
                              }
                          });
                      }
              };

</script>
<div class ="wrapper">
                  <h1 class="faqH1">FAQs</h1>
                   <br>
                   <!-- Le tag button della classe accordion devono per forz stare immediatamente prima la tag div con classe di                            stile Panel perchè il codice Javascript che implementa la comparsa dei div non riesce a farli comparire                             (deriva dall'uso della proprietà nextElementSibling)-->
                   <button class="accordion">I piedi sono le mani delle gambe o le gambe sono le mani dei piedi?                                 </button>
                   <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore                                 et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut                                   aliquip ex ea commodo consequat.</p>
                   </div>
                   <button class="accordion">I piedi sono le mani delle gambe o le gambe sono le mani dei piedi?                                 </button>
                   <div class="panel">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore                                 et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut                                   aliquip ex ea commodo consequat.</p>
                   </div> 
                        <button class="accordion">I piedi sono le mani delle gambe o le gambe sono le mani dei piedi?                                 </button>
                        <div class="panel">
                               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                   labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                   nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                </div>

@endsection