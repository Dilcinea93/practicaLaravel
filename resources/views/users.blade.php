@extends('layout')
<!--Directiva,      este sera el titulo de la pagina-->
@section('title', "usuarios")
@section('content')

	<!-- {{$title}}  Muestra "la variable" $title que envio desde el controlador de esta vista.. en la linea 17-->

<table class="table table-striped">
	<!-- <tr>
		<th>Nombre</th>
		<th>Correo</th>
		<th>Website</th>
		<th>Profesion</th>
	</tr>

		<ul>
			@forelse ($users as $user)
			<li>{{$user->name}}. Profesion: {{$professions->title}}</li>
			@empty
			<li>No hay usuarios registrados</li>

			@endforelse
		</ul>

	
</table> -->


		<table class="table table-striped">
		<thead>
		    <tr>                            
		        <th>Nombre</th>
		        <!-- <th>Correo</th>
		        <th>Website</th> -->
		        <th>Profesion</th>
		    </tr>
		</thead>
		<tbody>
		    @foreach ($users as $user)
		    <tr>  
		    	<!--Esta es una forma de enviar el parametro... abajo hay otra-->
		        <!--td><a href="{{url('./usuarios/'.$user->id)}}">{!! $user->name !!}</a></td-->
		        <!--td><a href="{{ action('UserController@show',['id'=>$user->id]) }}">{!! $user->name !!}</a></td-->
		        <!-- 
					El problema de definir las url asi como esta arriba, es que si en la ruta cambio el nombre de la accion (el cual tambien deberia cambiar en el controlador) pero no la cambio en la definidio de la url, lo tengo que hacer manualmente..
					asi que si en el archivo de rutas le pongo nombres a las rutas, puedo hacer esto..
		        -->
		        <td><a href="{{ route('users.show',['id'=>$user->id]) }}">{!! $user->name !!}</a></td>
		        <!--Entonces eso va a buscar a la ruta por su nombre y automaticamente se va a donde dice la ruta.. al controlador y a la accion correspondientes-->
		        <td>{!! $user->email !!}</td>

		    </tr>
		   @endforeach
		</tbody>
		</table>
@endsection


<!-- @section('sidebar')
	@parent
		<h1>barra lateral personalizada</h1>
@endsection -->