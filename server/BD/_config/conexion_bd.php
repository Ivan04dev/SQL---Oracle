<?php
 
	class conexionBD{
	      
	    private $conexionBD;
	    private $usuarioBD = 'APLCOBPAG';
	    private $password  = 'AbCobpag12_43Lmt';
	    private $bd        = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = aerys)(PORT = 1598))(CONNECT_DATA = (SERVER = DEDICATED)(SERVICE_NAME =  marktpro.izzitelecom.net)))';

		public function Conexion(){

	      	$this->conexionBD = oci_connect($this->usuarioBD,$this->password,$this->bd);

	        if (!$this->conexionBD){
	        	
	          	$msj = oci_error();

	          	echo $msj['message'],"\n";

	          	exit;
	        }else{
	        	echo "conexxion chida";
	        }

	        return $this->conexionBD;

		}

	}

?>