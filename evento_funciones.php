<?php
$_user="telecpro";
$_pass="m14xM14X5.$";
function Estado($usuario, $pass){
	try{        
		$client = new SoapClient('http://freyja.tuves.com/tuves/provisionamiento/gate?wsdl');
		$parametros=array(
			'username'=> $usuario,
			'password'=> $pass,
		);
		$resultado=$client->status($parametros);    
		return $resultado;    	
	}catch(Exception $e){
		return $e->getMessage();
	}
}
function Mensaje($usuario, $pass,$secuencia,$tarjeta,$mensaje){
	try{        
		$client = new SoapClient('http://freyja.tuves.com/tuves/provisionamiento/gate?wsdl');
		$parametros=array(
			'username'=> $usuario,
			'password'=> $pass,
			'sequence'=>$secuencia,
			'smartcard'=>$tarjeta,
			'message'=>$mensaje,
			'user_id'=>'',
			'reference_number'=>'',
			'notes'=>'',
			'customer_id'=>'',
			'zone'=>'',
		);
		$resultado=$client->sendMessage($parametros);    
		return $resultado;    	
	}catch(Exception $e){
		return $e->getMessage();
	}
}
function Desconectar($usuario, $pass,$secuencia,$tarjeta){
	try{        
		$client = new SoapClient('http://freyja.tuves.com/tuves/provisionamiento/gate?wsdl');
		$parametros=array(
			'username'=> $usuario,
			'password'=> $pass,
			'sequence'=>$secuencia,
			'smartcard'=>$tarjeta,			
			'user_id'=>'',
			'reference_number'=>'',
			'notes'=>'',
			'customer_id'=>'',
			'zone'=>'',
		);
		$resultado=$client->disconnect($parametros);    
		return $resultado;    	
	}catch(Exception $e){
		return $e->getMessage();
	}
}
function Reconectar($usuario, $pass,$secuencia,$tarjeta,$pak){
	try{        
		$client = new SoapClient('http://freyja.tuves.com/tuves/provisionamiento/gate?wsdl');
		$parametros=array(
			'username'=> $usuario,
			'password'=> $pass,
			'sequence'=>$secuencia,
			'smartcard'=>$tarjeta,
			'Packs' => array(
				'item'=>$pak,
			),
			'user_id'=>'',
			'reference_number'=>'',
			'notes'=>'',
			'customer_id'=>'',
			'zone'=>'',
		);
		$resultado=$client->reconnect($parametros);    
		return $resultado;    	
	}catch(Exception $e){
		return $e->getMessage();
	}
}
function Instalar($usuario, $pass,$secuencia,$tarjeta,$stbid,$pak,$mastercard){
	try{        
		$client = new SoapClient('http://freyja.tuves.com/tuves/provisionamiento/gate?wsdl');
		$parametros=array(
			'username'=> $usuario,
			'password'=> $pass,
			'sequence'=>$secuencia,
			'smartcard'=>$tarjeta,
			'Settopbox'=> array(
				'code'=>$stbid,
				'brand'=>'',
				'model'=>'',
				'firmware'=>'',
			),
			'Packs' => array(
				'item'=>$pak,
			),
			'mastercard'=>$mastercard,
			'user_id'=>'',
			'reference_number'=>'',
			'notes'=>'',
			'customer_id'=>'',
			'zone'=>'',
		);
		$resultado=$client->install($parametros);    
		return $resultado;    	
	}catch(Exception $e){
		return $e->getMessage();
	}
}
function Reiniciar($usuario, $pass,$secuencia,$tarjeta){
	try{        
		$client = new SoapClient('http://freyja.tuves.com/tuves/provisionamiento/gate?wsdl');
		$parametros=array(
			'username'=> $usuario,
			'password'=> $pass,
			'sequence'=>$secuencia,
			'smartcard'=>$tarjeta,			
			'user_id'=>'',
			'reference_number'=>'',
			'notes'=>'',
			'customer_id'=>'',
			'zone'=>'',
		);
		$resultado=$client->rebootSetTopBox($parametros);    
		return $resultado;    	
	}catch(Exception $e){
		return $e->getMessage();
	}
}
function objectToArray($d){
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}
//$respuesta[]=Mensaje('telecpro','m14xM14X5.$','23','0100241148','Enviado desde App-Telecpro');
//$respuesta=array();
//$respuesta=json_encode(objectToArray(Mensaje('telecpro','m14xM14X5.$','25','0100241148','Enviado desde App-Telecpro')));
//print_r($respuesta);
//if ($respuesta[0]==0){
//	echo 'Mensaje Enviado con exito '+ int($respuesta[0]);
//}else{
//	echo 'Error Envio de Mensaje ' + $respuesta[0];
//}

//var_dump(desconectar('telecpro','m14xM14X5.$','12','0100241148'));
//var_dump(reconectar('telecpro','m14xM14X5.$','13','0100241148','PAK230'));
//var_dump(instalar('telecpro','m14xM14X5.$','14','0100241148','0200000005F98EFC','PAK230',''));
//var_dump(reiniciar('telecpro','m14xM14X5.$','22','0100241148'));

?>