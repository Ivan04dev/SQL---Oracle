<?php

	error_reporting(0);
	
	include ("configuracion.php");

	class conexionBD{

		public $conexion;

		public function conectar(){

			$this->conexion = oci_connect(USUARIO,PASS,HOST);

			if(!$this->conexion){
				
				$this->msj = oci_error();
				
				echo $this->msj['message'],"\n";
			
				exit;

			}

			// echo "Conexión OK!";

		    return $this->conexion;	

		}

		public function cerrarConexion(){

			oci_close($this->conexion);

		}

	}

?>