@extends('site.layout')

@section('title', 'Página Principal')

@section('conteudo')
    {{-- Isso é um comentário!!! --}}

    {{-- isset($nome) ? "Existe" : "Não existe" --}}

    {{ $teste ?? "Padrão"}}
@endsection