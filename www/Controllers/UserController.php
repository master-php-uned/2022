<?php 

class UserController extends Controller {

	public function __construct() {
		parent::__construct();
		// Inicializamos las sesiones
		session_start();
	}

	public function Register() {
		// comprobamos si existen la variable de sesión
		if(isset($_SESSION['model1']) && isset($_SESSION['model2'])){
			// deserealizamos la variable de sesión
			$array1 = unserialize($_SESSION['model1']);
			$array2 = unserialize($_SESSION['model2']);
			if($array1 != null && $array2 != null){
				// Si los arrays no son nulos damos acceso a la función TUser
				$model1 = $this->TUser($array1);
				$model2 = $this->TUser($array2);
				// Eliminamos la información de las variables de sesión $model1 y $model2
				$_SESSION['model1'] = "";
				$_SESSION['model2'] = "";
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
		$_SESSION['model1'] = serialize(array(
			$_POST["nif"],
			$_POST["name"],
			$_POST["lastName"],
			$_POST["email"],
			$_POST["password"],
		));
		// creamos una segunda variable de sesión que almacena el valor de las variables resultado de comprobar si los campos del formulario de registro están vacios, variables de validación
		$_SESSION['model2'] = serialize(array(
			$nif,
			$name,
			$lastName,
			$email,
			$password,
		));
		// redireccionamos a la vista registrar
		header('Location: Register');
	}
}


?>