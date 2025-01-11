@extends('layouts.base')

@section('tituloHead')
FakeTagram - Seguidores
@endsection


@section('titulo')
Seguidores de {{$user->username}}
@endsection

@section('contenido')
<x-view-users-component :usersId="$user->followers->pluck('id')"/>
@endsection