<!DOCTYPE html>
<html>
<head>
	<title>
		Listado de usuarios
	</title>
</head>
<body>
<h1>Usuarios VISTA</h1>sdfsdf
<ul>
	//echo $title;
	{{$title}} //Asi imprimimos con blade
	echo "</br>";
		@foreach($users as $user)
			//la funcion "e" solo escapa caracteres que no sean de HTML y los muestra como texto plano.. para que veas imprimi unas etiquetas php alla abajo..
			
				<li>{{$user}}</li>
			
		@endforeach;

		echo e('<?php ?>');
	
</ul>

</body>
</html>