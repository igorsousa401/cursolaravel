@extends('site.layout')
@section('title', 'Cadastrar')
@section('conteudo')

@if($mensagem = Session::get('erro'))
    <p>{{$mensagem}}</p>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        {{$error}}<br>
    @endforeach
@endif

<div class="row container center ">
    <form style="width: 70%;"  class="center " action="{{route('users.store')}}" method="POST">
        @csrf
        Nome:<br> <input  type="text" name="firstname"><br>
        Sobrenome:<br> <input  type="text" name="lastname"><br>
        Email:<br> <input  type="email" name="email"><br>
        Senha:<br> <input type="password" name="password"><br>
        
        <button type="submit" class="btn-large green"> Entrar </button>
    </form>
</div>
    

@endsection