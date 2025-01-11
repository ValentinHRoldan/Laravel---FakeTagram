@extends('layouts.base')

@section('tituloHead')
FakeTagram - Seguidos
@endsection


@section('titulo')
Seguidos de {{$user->username}}
@endsection

@section('contenido')
<x-view-users-component :usersId="$user->followings->pluck('id')"/>
@endsection