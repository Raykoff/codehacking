@extends('layouts.app')

@section('content')
    <div class="container">
    <h2>Editar usuario</h2>

    <form action="/usuarios/{{$user->id}}" method="post">
        {{csrf_field()}}

    <input type="hidden" name="_method" value="PUT">
    <div class="col-xs-3" style="padding: 0px" >

        <input type="text" name="name" value="{{$user->name}}" class="form-control" >
    </div>
        <br>
        <br>
        <div class="col-xs-3" style="padding: 0px">

        <select class="form-control" name="role_id">
            @foreach($roles as $role)
                <option value="{{$role->id}}" {{$user->role->name == $role->name ? 'selected="selected"' : ''}}>{{$role->name}}</option>
            @endforeach
        </select>
        </div>
        <br>
        <br>

        <input type="submit" class="btn btn-primary" value="Editar">

    </form>
    </div>
@endsection