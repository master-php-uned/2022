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
					$this->NIF = $array[0];
					$this->Name = $array[1];
					$this->LastName = $array[2];
					$this->Email = $array[3];
					$this->Password = $array[4];
				}
			}
		};
	}
}



?>