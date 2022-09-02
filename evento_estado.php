<?php
include "evento_funciones.php";
$id =$_POST['id'];
//echo 'ESTADO: '.$id;
try{        
    $client = new SoapClient('http://freyja.tuves.com/tuves/provisionamiento/gate?wsdl');
    $parametros=array(
        'username'=> $_user,
        'password'=> $_pass,
    );
    $resultado=$client->status($parametros);    
    echo $resultado;    	
}catch(Exception $e){
    echo $e->getMessage();
}
?>