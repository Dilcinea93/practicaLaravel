@extends('layout')
@section('title', "Crear usuarios")



@section('content')
<div class="ROW">
	<div class="col-md-5 col-md-offset-5">
		<a href="{{url('/usuarios')}}">Volver al listado de usuarios</a>
	</div>
</div>
	<h1>Crear usuario</h1>
<?php// dd($errors);?>
@if($errors->any()) <!-- La variable errors es enviada automaticamente de laravel a la vista-->
    <div class="alert alert-danger">
       <!--  <ul> 
            @foreach($errors->all() as $error) 
            
                <li>{{$error}}</li>
            
            @endforeach
        </ul> 
        pero un listado asi no me gusta.. pondre cada mensaje debajo de cada campo
    -->
<p>Porfavor corrige los siguientes errores</p>

    </div>
@endif
	<form method="post" action="{{url('usuarios')}}" role="form">
		{!! csrf_field() !!}
		
    <div class="form-group">
    	<label for="name">Nombre</label>
		<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Introduce tu nombre">

        @if ($errors->has('name'))
            <h5>{{$errors->first('name')}}</h5>
        @endif
    </div>
    <div class="form-group">
    	<label for="email">Email</label>
    	<input type="email" class="form-control" name="email" value="{{ old('email') }}">
        <!-- old('email') es para que cuando se recargue la pagina no se pierda el valor del campo... Aunque no me funciona.. Es que tenia que poner la funcion withInput en el controlador..-->
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