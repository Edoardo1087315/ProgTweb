@extends('layouts/public')
@section('title', 'Area Amministratore')
@section('content')
<style>
.float-container {
    border: 3px solid #fff;
    padding-top:20px;
    padding-bottom:20px;
    width:100%;
    height:70vh;
    display: flex;
    justify-content:space-around;
}

.float-child {
    min-width:45%;
    float: left;
    height:auto;
    text-align: center;
}  
</style>
<div class="float-container">

  <div class="float-child">
      <div class='clienti'><h2>gestione clienti</h2></div>
  </div>
    
  
  <div class="float-child">
    <div class="organizzazioni"><h2>gestione organizzazioni</h2></div>
  </div>
  
</div>
@endsection