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
        <p style="font-style: italic; font-size: 15px;">
            Postado por: {{$produto->user->firstname}}<br>
            Categoria: {{$produto->categoria->nome}}
        </p>

        <p style="font-size: 25px; font-weight:700;">{{"R$ ".number_format($produto->preco, 2, ',', '.')}}</p>

        <form method="POST" action="{{Route('site.addcarrinho')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="name" value="{{$produto->nome}}">
            <input type="hidden" name="price" value="{{$produto->preco}}">
            <input style="width:40px; display:block;" min="1" type="number" name="quantity" value="1">
            <input type="hidden" name="image" value="{{$produto->imagem}}">
            <button type="submit" class="btn orange btn-large">Comprar</button>
        </form>

        
        
    </div>
</div>


@endsection

