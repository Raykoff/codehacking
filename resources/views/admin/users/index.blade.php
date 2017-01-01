<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	{{--{{phpinfo()}}--}}
	<div class="container">
		<ul>
 	@foreach($users as $user)
		<li><a href="{{route('usuarios.show', $user->id)}}">{{$user->name}}</a></li>

		@endforeach
		</ul>
	</div>
</body>
</html>