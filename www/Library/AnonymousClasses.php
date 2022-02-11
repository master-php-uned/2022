<?php
// 
// tipado estricto
declare (strict_types = 1);
class AnonymousClasses 
{
	public function  TUser(array $array){
		// La función TUser recibe un parametro de tipo array y devuelve una clase anónima
		return new class($array){
			public $NIF;
			public $Name;
			public $LastName;
			public $Email;
			public $Password;

			function __construct($array){
				//Comprobamos si el array contiene información
				if(0 < count($array)){
					// Comprovamos si las llaves del array estan vacias, en caso de no estar vacias se inicializa el atributo correspondiente con la información del array y su respectiva llave
					if (!empty($array["NIF"])) {$this->NIF = $array["NIF"];}
					if (!empty($array["Name"])){$this->Name = $array["Name"];}
					if (!empty($array["LastName"])){$this->LastName = $array["LastName"];}
					if (!empty($array["Email"])){$this->Email = $array["Email"];}
					if (!empty($array["Password"])){$this->Password = $array["Password"];}
				}
			}
		};
	}
}



?>