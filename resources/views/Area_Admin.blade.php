@extends('layouts/public')
@section('title', 'Area Amministratore')
@section('content')

<script type="text/javascript" src="{{asset('jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('jqueryshadow.js')}}"></script>
<script type="text/javascript">
$(function() {
    
                    var clienti = $('.gest-clienti');
                    var organizzazione = $('.gest-organizzazioni');
                    var childright = $('.float-child-right');
                    var childleft = $('.float-child-left');
                    var wrap = $('.wrap');
                    var button = $('#table_org div ');
                
                $('table tr:nth-child(even)').css('background-color','#f9f9f9');


                childleft.on('click',function(){
                    if(!childleft.hasClass('active')){
                        childleft.addClass('active');
                        childright.removeClass('active');
                      childright.animate({boxShadow: '2px -2px 1px 1px'},{ duration: 200} );
                      wrap.animate({boxShadow:'2px -2px 1px 1px'},{duration:200 ,queue:false});
                      organizzazione.animate({opacity:'0%'},{ duration: 200} );
                      childleft.css('border-bottom','none');
                      childright.css('border-bottom','2px solid black');
                      organizzazione.addClass('hide');
                      clienti.removeClass('hide');
                       childleft.animate({boxShadow: '13px -10px 5px 5px'},{ duration: 200});
                       wrap.animate({boxShadow:'13px -10px 5px 5px'},{duration:200 ,queue:false});
                        childleft.css({'background-color': '#EEEEEE'},{duration:200 ,queue:false});
                        wrap.css({'background-color': '#EEEEEE'},{duration:200 ,queue:false});
                        childright.css({'background-color': '#FFFFFF'},{duration:200 ,queue:false});
                        clienti.animate({opacity: '100%'},"slow");
                        
                        
                    }
                              
                })
                
                childright.on('click',function(){
                    if(!childright.hasClass('active')){
                        childright.addClass('active');
                        childleft.removeClass('active');
                      childleft.animate({boxShadow: '2px -2px 1px 1px'},{ duration: 200} );
                      wrap.animate({boxShadow:'2px -2px 1px 1px'},{duration:200 ,queue:false});
                      clienti.animate({opacity:'0%'},{ duration: 200} );
                      childright.css('border-bottom','none');
                      childleft.css('border-bottom','2px solid black');
                      clienti.addClass('hide');
                      organizzazione.removeClass('hide');
                       childright.animate({boxShadow: '13px -10px 5px 5px'},{ duration: 200});
                       wrap.animate({boxShadow:'13px -10px 5px 5px'},{duration:200 ,queue:false}); 
                        childleft.css({'background-color': '#FFFFFF'},{duration:200 ,queue:false});
                        wrap.css({'background-color': '#EEEEEE'},{duration:200 ,queue:false});
                        childright.css({'background-color': '#EEEEEE'},{duration:200 ,queue:false});
                        organizzazione.animate({opacity: '100%'},"slow");
                    

                }
                })
                
                $('#aggiungi').on('click',function(){
                   $('#table_org').append(
                            '<tr><td><input type="text" placeholder="nome"></td><td><input type="text" placeholder="cognome"></td><td><input type="text" placeholder="email"></td><td><input type="text" placeholder="username"></td><td><input type="text" placeholder="data di nascita"></td><td><input type="text" placeholder="telefono"></td><td><input type="text" placeholder="sito web"></td></tr>');
                 
                })
                $('.button_id').on('click',function(){
                  if($(this).hasClass('fa fa-send')){
                     $(this).submit();
                      
                  }
                  else{
                  $(this).closest('tr').children('td').children('input').prop('readonly',false);
                  $(this).closest('tr').css('color','blue');
                  $(this).removeClass('fa fa-lock');
                  $(this).addClass('fa fa-send');
                  button.not($(this)).css('display','none');
                   $(this).attr('id');
                  $(this).css('display','normal');
              }
              })
            });
</script>
<style type="text/css">
.float-container {
    padding-top:20px;
    width:100%;
    display: flex;
    justify-content:space-around;
}

.float-child-left {
    min-width:45%;
    float: left;
    height:auto;
    text-align: center;
    cursor: pointer;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    border: 2px solid black;
    border-bottom: none;
    box-shadow: 13px -10px 5px 5px;
    background-color: #EEEEEE;
    
}

.float-child-right {
    min-width:45%;
    float: left;
    height:auto;
    text-align: center;
    cursor: pointer;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    border: 2px solid black;
    background-color: white;
    box-shadow: 2px -2px 1px 1px;
    
}

.hide{
    width:0%;
    height:0%;
    
}

th,td{
  text-align: left;
  padding: 8px;
}
.active{
    
}
table{
  border-collapse: collapse;
  padding-top: 20px;
  padding-bottom: 10px;
  margin-right:10px;
  margin-left:10px;
}

.gest-clienti{
    overflow-x:auto;
    float: left;  
    margin-top: 20px;
}

.gest-organizzazioni{
    overflow-x:auto;
    opacity:0%;
    float: left;
    margin-top: 20px;
}

.wrap{
    background-color: #EEEEEE;
    overflow-x:auto;
    width:100%;
    height:100%;
    box-shadow: 13px -10px 5px 5px;
}

.buttons{
    margin:10px 10px 10px 10px ;
    clear:both;
}

.button_id{
    cursor:pointer;
}
form{
    
}
  
</style>
</head>

<div class="float-container">

  <div class="float-child-left active">
          <h2>gestione clienti</h2>
  </div>
  <div class="float-child-right"">
    <h2>gestione organizzazioni</h2>
  </div>
</div>
<div class="wrap">
<div class="gest-clienti">
    <table id="table_client">
        <tr>
            <th>Nome</th><th>Cognome</th><th>Email</th><th>Username</th><th>Data di nascita</th><th>Telefono</th><th>Sito Web</th><th>Elimina</th>
        </tr>
        @foreach($users as $user)
        @if($user->role == ('user'))
        <tr>
            <td>{{$user->nome}}</td><td>{{$user->cognome}}</td><td>{{$user->email}}</td><td>{{$user->username}}</td><td>{{$user->data_nascita}}</td><td>{{$user->telefono}}</td><td>{{$user->sito}}</td><td><a class="fa fa-trash" href="{{route('deleteUser',[$user->id])}}"></a></td>
        </tr>
        @endif
        @endforeach
        
    </table>

    </div>
<div class="gest-organizzazioni hide">
    <table id="table_org">
        <tr>
            <th>Nome</th><th>Cognome</th><th>Email</th><th>Username</th><th>Data di nascita</th><th>Telefono</th><th>Sito Web</th><th>Modifica</th>
        </tr>
        @foreach($users as $user)
        @if($user->role == ('company'))
       
        <tr>
             {{Form::open(['route' => 'modifica','id' => $user->id])}}
            <td>{{Form::text('nome',$user->nome,['readonly' => true])}}</td><td>{{Form::text('cognome',$user->cognome,['readonly' => true])}}</td><td>{{Form::text('email',$user->email,['readonly' => true])}}</td><td>{{Form::text('username',$user->username,['readonly' => true])}}</td><td>{{Form::text('data',$user->data_nascita,['readonly' => true])}}</td><td>{{Form::text('telefono',$user->telefono,['readonly' => true])}}</td><td>{{Form::text('sito',$user->sito,['readonly' => true])}}</td><td><div id="{{$user->id}}" class="fa fa-lock button_id"></div>
             {{Form::close()}}   
        </tr>
        
        @endif
        @endforeach
        
    </table>

    <div class="buttons">
    <button id="aggiungi" class="fa fa-plus"></button>
    <button id="submit" class="fa fa-check"></button>
</div>
</div>
</div>
@endsection
