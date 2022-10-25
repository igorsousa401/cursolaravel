@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')

<div class="row container">
    <div class="col m12 m6">
        <img src="{{$produto->imagem}}" class="responsive-img">
        
    </div>

    <div class="col m12 m6">
        <h2>{{$produto->nome}}<h2>
        <p>{{$produto->descricao}}</p>
        <button class="btn orange btn-large">Comprar</button>
    </div>
</div>


@endsection

