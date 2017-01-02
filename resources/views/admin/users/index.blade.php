@extends('layouts.app')

@section('content')
	<div class="container">
	<table class="table table-bordered table-striped table-hover">
		<thead>
		<tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rango</th>
            <th>Accion</th>
		</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
		<tr>
			<td><b>{{$user->name}}</b></td>
			<td><b>{{$user->email}}</b></td>
			<td><b>{{$user->role['name']}}</b></td>
            <td>
                <div class="col-sm-4 row">
                <a href="{{route('usuarios.show', $user->id)}}" class="btn btn-sm btn-info">Ver</a>
                    </div>
                <div class="col-sm-4 row">
                <a href="{{route('usuarios.edit', $user->id)}}" class="btn btn-sm btn-primary">Editar</a>
                    </div>
                <div class="col-sm-4 row">
                <form action="/usuarios/{{$user->id}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Borrar" class="btn btn-sm btn-danger">
                </form>
                    </div>

            
            </td>
		</tr>
			@endforeach

		</tbody>
	</table>
	</div>
<div style=" display: table;margin-right: auto;margin-left: auto;" >
	{{$users->links()}}
</div>
	@endsection
