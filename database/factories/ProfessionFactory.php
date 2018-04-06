<?php
/*ESTE lo cree a mano porque laravel 5.4 no tiene disponible el comando php artisan make:factory que me ahorraria hacer esto a mano
*/
	use Faker\Generator as Faker;

/*
	Debe contener la ruta del modelo del cual quiero crear registros falsos.
*/
	$factory->define(App\Models\Profession::class,function(Faker $faker){
		return [
			'title'=>$faker->sentence(3,false)//se crearan frases falsas (aleatorias) de tres palabras
			/* el campo en el cual se crean datos falsos.. en este caso en el campo title se crean frases (sentences) de 3 palabras.. y el atributo false no se para que */
		];
	});
?>