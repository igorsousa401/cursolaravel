@extends('site.layout')
@section('title', 'Página Principal')
@section('conteudo')

<div class="row container">
    <h5>Seu carrinho possui {{$itens->count()}} produtos.</h5>
    <table class="striped">
        <thead>
          <tr>
              <th></th>
              <th>Nome: </th>
              <th>Preço: </th>
              <th>Quantidade: </th>
              <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($itens as $item) 
            <tr>
                <td><img src="{{$item->atributtes->image}}" class="responsive-img" alt="" width="70px"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td><input style="width: 40px;" type="number" name="quantity" value="{{$item->quantity}}"></td>
                <td>
                    <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                    <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                </td>
            </tr>   
        @endforeach
        </tbody>
    </table>
    <div class="row container center">
        <button class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></button>
        <button class="btn waves-effect waves-light red">Limpar carrinho<i class="material-icons right">clear</i></button>
        <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>
    </div>
</div>
@endsection
