@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')
<style>
    h2{
        font-size: 35px;
    }
    p{
        font-size: 16px; 
        line-height: 20px;
    }
</style>
<div class="row container" style="margin-top: 30px">
    <div class="col m12 m6" style="width: 50%; display: inline-block;">
        <img src="{{$produto->imagem}}" class="responsive-img">
        
    </div>

    <div class="col m12 m6" style=" display: inline-block; width: 50%">
        <h2>{{$produto->nome}}<h2>
        <p>{{$produto->descricao}}</p>

        <p style="font-size: 25px; font-weight:700;">{{"R$ ".$produto->preco}}</p>
        <button class="btn orange btn-large">Comprar</button>
    </div>
</div>


@endsection

