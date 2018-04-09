<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profession;
use App\User;
use \Illuminate\Validation\Validator;

class UserController extends Controller
{
    public function index(){
    	
    		// $users=['Joel',
	    	// 'Juan',
	    	// 'Maria',       LISTADO ESTATICO:
	    	// 'Nercy',
	    	// 'Jose'];
    //	$users= DB::table('users')->get();   //LISTADO DINAMICO.... Tengo que importar la clase DB. para hacerlo con el contructor de consultas de laravel.

        $users= User::all();//Listado dinamico utilizando la clase.. Da el mismo resultado que la instruccion de arriba. (Retorna una instancia de eloquent, por lo que no me va a dar el mismo error de htmlspecialchars porque es error me dio fue porque cuando yo estaba haciendo esto DB::table('users')->get(); me estaba retornando un objeto de la clase standar de php, no un objeto de eloquent...  como es un objeto (cada item es un objeto) sus datos no podian ser extraidos imprimiendo asi {{$user}}.. ya que la variable $user debia acceder a una propiedad del objeto para mostrar su valor.. porque es un objeto ps..

        /*
            pero cuando hago esto $users= User::all(); me retorna un objeto de eloquent... que como tiene una sintaxis mas adaptada a laravel, no me saldra el mismo error.. no entiendo bien...
        */
            // dd($users);
         $professions=\App\Models\Profession::where(['title'=>'Cantante'])->first();
         /*
            la instruccion de arriba me muestra esto en el navegador, tal cual..
    
    {"id":1,"title":"Cantante","created_at":"2018-04-05 14:59:04","updated_at":"2018-04-05 14:59:04"}

    y no quiero que me muestre eso, asi que 

         */

        //dd($users);   solo para verlo como un die..
    	$title='Listado de usuarios';
    	//Tenemos que enviar este array a la vista
    	// return view('users',['usuarios'=>$users,
    	// 	'title'=>'Listado de usuarios'
    	// ]);

    	//otra forma de pasar variables a la vista es enviarlas con el metodo with...
    	//aunque basicamente es lo mismo.. no se cual es la diferencia..
    	//return view('users')->with(['users'=>$users,'title'=>'Listado de usuarios']);
    	

    	// return view('users')->with(['users'=>$users])
    	// ->with(['title'=>'Listado de usuarios']);

    	/*Cuarta forma de hacerlo: Con la funcion compact de php que me convierte las variables locales en arrays asociativos. eso para no estar escribiendo por ejemplo esto: users'=>$users que escribi dos veces "users".. es como una forma mas rapida ps, para no escribir el array asociativo sino que php lo haga por ti.. pero es opcional.. sin la funcion compact tambien me funciona..*/



            $var="<br>YOHANNA</br>"; //Si intento imprimir esta variable desde la vista, con esta sintaxis {{}} se va a imprimir el html (etiquetas <br>).. pero si lo hago con esta sintaxis {!! $var !!} no se va a imprimir las etiquetas
    	return view('users',compact('title','users','professions'));
        //Otra forma de retornar variables a la vista..

        // return view('users')
        // ->with('users',User::all())
        // ->with('title',$title)
        // ->with('professions',$professions);
    }

     //public function show($id){ //Para ahorrarme la linea 69, puedo hacer esto....
    public function show(User $user){ //pero debo tener en cuenta que en la ruta de este controlador tengo que poner el mismo nombre del argumento al parametro.
        //$user= User::find($id);//En este tipo de instrucciones se llama a las funciones definidas en el archivo Elloquent/Builder..  de hecho para ahorrarme el condicional de abajo.... puedo hacer... (linea 71) 
        // if($user==NULL){
        //     return response()->view('errors.404',[],404);//Cuando una pagina no se encuentre hay que enviarle al navegador la orden de que devuelva una respuesta con codigo 404.. porque sino devuelve 200... Eso se puede indicar con esta sintaxis... es lo correcto... es util para los buscadores
        // }
        //$user= User::findOrFail($id);//este metodo dice que si encuentra al usuario, fino.. pero si no lo encuentra, termina la ejecucion del controlador (en este punto), manda al navegador el codigo 404, y ubica automaticamente al archivo 404 de la carpeta errors (por convencion....) para mostrar el error que defini.. osea, esta linea 71 resume lo que hice en las lineas 67 a la 70 
        //exit('Linea no alcanzada');


       // dd($user);
       
        return view('users-show',compact('user'));
    }

    public function create(){
    	return view('create');
    }

    public function store(){
        //$data= request()->all();

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|unique:posts|max:10',
        //     'email' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('usuarios/nuevo')
        //                 ->withErrors([
        //         'name'=>'El campo nombre es obligatorio',
        //         'email'=>'Debes introducir un email'
        //     ])
        //     ->withInput();
        // }
        //No se, dice que el metodo validate no existe.. y no me funciona esta validacion asi... asi que la hice con withErrors..
        // $data= request()->validate([     (estas tres lineas no me funcionan)
        //     'name'=>'required'
        // ]);
        //dd($data);
         if(empty($data['name'])){       //ESTO ME FUNCIONA::: (5 lineas )
            return redirect('usuarios/nuevo')->withErrors([
                'name'=>'El campo nombre es obligatorio',
                'email'=>'Debes introducir un email'
            ])->withInput(); 
         }
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password'])
        ]);
        return redirect('usuarios'); //esta es una forma de redireccionar.. abajo hay otra
       // return redirect()->route('usuarios');  //route es para utilizar las rutas por su nombre
    }
}
