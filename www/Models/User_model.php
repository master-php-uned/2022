<?php
//
class User_model
{
	public function __construct(){
		
	}

	public function AddUser($model){

		$arraymodel = (array)$model;

		// Array con los usuarios ya registrados
		$Users = array(
			array(
				"NIF"=>"23471293H",
				"Name"=>"Juan",
				"LastName"=>"Enciso",
				"Email"=>"juane@hotmail.com",
				"Password"=>"asdfñlkj"
			),
			array(
				"NIF"=>"29351293R",
				"Name"=>"Pedro",
				"LastName"=>"Picapiedra",
				"Email"=>"pedropica@hotmail.com",
				"Password"=>"qwerpoiu"
			),
			array(
				"NIF"=>"23470472S",
				"Name"=>"Ana",
				"LastName"=>"Garcia",
				"Email"=>"anag@hotmail.com",
				"Password"=>"zxcv-.,m"
			)
		);

		try {

			if(count($Users) > 0){
				// verificamos si el email ingresado ya está registrado y si no lo esta registramos al usuario
				$keys = array_keys(array_combine(array_keys($Users),array_column($Users, 'Email')),$arraymodel["Email"]);
				if(!$keys) {
					array_push($Users,$arraymodel);
					return true;

				}else{
					return "El email ya esta registrado";
				}

			}else{
				array_push($Users,$arraymodel);
			}
			// print_r($Users);
		} catch(\Throwable $th) {
			//return $th->getMessage();
		}
		

	}
}

?>