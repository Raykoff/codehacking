@extends('layouts.app')

@section('content')
    <div class="container">

        <h3><b>Nombre:</b> {{$user->name}}</h3>
        <img src="/uploads/avatars/{{$avatar}}" alt="">
        {{--{!! Form::open(array('action' => 'PerfilController@createAvatar')) !!}--}}
        <form action="{{action('PerfilController@store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="file" name="file">
            <input type="submit" value="Subir">
        </form>



        {{--{!! Form::close() !!}--}}
        <h3><b>E-mail:</b> {{$user->email}}</h3>
        <h3><b>Privilegio: </b>{{$user->role->name}}</h3>
        <h3><b>Creado: </b>{{$user->created_at}}</h3>
        <h3><b>nº de posts: </b>{{$user->posts->count()}}</h3>
        {{--<a href="{{route('usuarios.edit', $user->id)}}">Edit</a>--}}
    </div>
@endsection