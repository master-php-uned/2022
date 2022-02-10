<?php 

class UserController extends Controller {

	public function __construct() {
		parent::__construct();
		// Inicializamos las sesiones
		//session_start();
	}

	public function Register() {
		$model1 = Session::getSession("model1");
		$model2 = Session::getSession("model2");
		// comprobamos si existen la variable de sesión
		if(null != $model1 || null != $model2){
			// deserealizamos la variable de sesión
			$array1 = unserialize($model1);
			$array2 = unserialize($model2);
			if($array1 != null && $array2 != null){
				// Si los arrays no son nulos damos acceso a la función TUser
				$model1 = $this->TUser($array1);
				$model2 = $this->TUser($array2);
				// Eliminamos la información de las variables de sesión $model1 y $model2
				Session::setSession('model1',"");
				Session::setSession('model2',"");
				$this->view->Render($this,"register",$model1,$model2,null);
			}else{
				$this->view->Render($this,"register",null,null,null);
			}
		}else{
			$this->view->Render($this,"register",null,null,null);
		}
		
	}

	// La función AddUser se ejecutara cuando se registre un usario
	public function AddUser() {
		// Comprobamos las validaciones de los campos para que no esten vacios
		$execute = true;
		if(empty($_POST["nif"])){
			$nif = "Enter your NIF";
			$execute = false;
		}
		if(empty($_POST["name"])){
			$name = "Enter your name";
			$execute = false;
		}
		if(empty($_POST["lastName"])){
			$lastName = "Enter your lastname";
			$execute = false;
		}
		if(empty($_POST["email"])){
			$email = "Enter your email";
			$execute = false;
		}else{
			// Si el email contiene datos validamos que sea un email valido
			if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
				$email = "Enter a valid email";
				$execute = false;
			}
		}
		if(empty($_POST["password"])){
			$password = "Enter a password";
			$execute = false;
		}
		// Creamos una variable de sesión para almacenar la información en la coockie del navegador, como la información se guarda en un string serializamos el array con el contenido de las variables de tipo POST
		// Modificamos el array proporcionando una llave para cada elemento del array, guardando en cada llave la información obtenida del formulario por cada elemento, así evitamos obtener información basada en posiciones
		$model1 = array(
			"NIF"=>$_POST["nif"],
			"Name"=>$_POST["name"],
			"LastName"=>$_POST["lastName"],
			"Email"=>$_POST["email"],
			"Password"=>$_POST["password"],
		);
		// creamos una segunda variable de sesión que almacena el valor de las variables resultado de comprobar si los campos del formulario de registro están vacios, variables de validación
		Session::setSession('model1',serialize($model1));

		// Evaluamos el objeto $execute, en caso de ser falso pasamos la información para obtener los errores en lo campos de texto, en caso de ser verdadero se crea el objeto $value que llama al objeto model de la clase Controller que se inicializa con una instancia de tipo model que creamos en la carpeta Models que contendra un método llamado AddUser que recibe como parametro la función TUser con los elementos del objeto $model1 con la información de nuestro array
		if ($execute){
			$value = $this->model->AddUser($this->TUser($model1));
			Session::setSession('model2',serialize(array(
				"Password"=>$value,
			)));
		}else{
			Session::setSession('model2',serialize(array(
				"NIF"=>$nif,
				"Name"=>$name,
				"LastName"=>$lastName,
				"Email"=>$email,
				"Password"=>$password,
			)));

		}
		// redireccionamos a la vista registrar
		header('Location: Register');
	}
}


?>