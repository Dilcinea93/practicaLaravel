@extends('layout')

@section('title', "usuarios {$user->id}")
@include('sidebar')
@section('content')
<h3>Usuario N# {{$user->id}}</h3>
<h5>Mostrando detalle del usuario {{$user->id}}</h5>

<table class="table table-striped">
	<tr>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Website</th>
		<th>Profesion</th>
	</tr>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->website}}</td>
		<td>{{$user->profession_id}}</td>
	</tr>
</table>
<!--a href="{{url()->previous()}}">Volver</a-->
<a href="{{route('users')}}">Volver</a>
@endsection