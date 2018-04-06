@extends('layout')
@section('title', "Crear usuarios")



@section('content')
<div class="ROW">
	<div class="col-md-5 col-md-offset-5">
		<a href="{{url('/usuarios')}}">Volver al listado de usuarios</a>
	</div>
</div>
	<h1>Crear usuario</h1>

	<form method="post" action="{{url('usuarios')}}" role="form">
		{!! csrf_field() !!}
		
    <div class="form-group">
    	<label for="name">Nombre</label>
		<input type="text" class="form-control" name="name" placeholder="Introduce tu nombre">
    </div>
    <div class="form-group">
    	<label for="email">Email</label>
    	<input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
    	<label for="email">Contraseña</label>
		<input type="password" class="form-control" name="password" placeholder="....">
    </div>
    <div>
		<button type="submit" class="btn btn-success">Registrar</button>
    </div>
	</form>
@endsection