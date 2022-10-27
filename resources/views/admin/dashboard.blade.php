@extends('site.layout')
@section('title', 'Dashboard')
@section('conteudo')

<h1>Olá {{auth()->user()->firstname}}</h1>

@endsection