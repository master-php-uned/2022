<?php 

class UserController extends Controller {

	public function __construct() {
		parent::__construct();
		// Inicializamos las sesiones
		session_start();
	}

	public function Register() {
		// comprobamos si existe la variable de sesión
		if(isset($_SESSION['model1'])){
			// deserealizamos la variable de sesión model 1 en el array1
			$array1 = unserialize($_SESSION['model1']);
			if($array1 != null){
				$model1 = $this->TUser($array1);
				$this->view->Render($this,"register",$model1);
			}else{
				$this->view->Render($this,"register",null);
			}
		}else{
			$this->view->Render($this,"register",null);
		}
		
	}

	// La función AddUser se ejecutara cuando se registre un usario
	public function AddUser() {
		$execute = true;
		if(empty($_POST["nif"])){
			$nif = "Ingrese su NIF";
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
		// redireccionamos a la vista registrar
		header('Location: Register');
	}
}


?>