<?php

class Index_model
{
	public function __construct() {
		
	}
	
	public function Login($model) {
		require "Users.php";

		$arraymodel = (array)$model;
		
		$param = $arraymodel["Email"];

		// verificamos si el email ingresado ya está registrado
		$keys = array_keys(array_combine(array_keys($Users),array_column($Users, 'Email')),$param);
		if(is_array($keys)){

			if(0 < count($keys)){
				$User = $Users[$keys[0]];
				if(0 < count($User)){
					if($arraymodel["Password"] === $User["Password"]){
						$data = array(
							"NIF" => $User["NIF"],
							"Name" => $User["Name"],
							"LastName" => $User["LastName"],
							"Email" => $User["Email"]
						);
						Session::setSession("User",$data);
						return 1;
					}else{
						return "Incorrect password";
					}
				}else{
					return "The email is not registered";
				}
			}else{
				return "The email is not registered";
			}
		}else{
			return $keys;
		}
	}
}


?>