@extends('layouts.app')

@section('content')
    <div class="container">

        <h3><b>Nombre:</b> {{$user->name}}</h3>
        <h3><b>E-mail:</b> {{$user->email}}</h3>
        <h3><b>Privilegio: </b>{{$user->role->name}}</h3>
        <h3><b>Creado: </b>{{$user->created_at}}</h3>
        {{--<a href="{{route('usuarios.edit', $user->id)}}">Edit</a>--}}
    </div>
@endsection