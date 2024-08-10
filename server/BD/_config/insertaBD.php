<?php
		
	class insertaBD{

        ###########################################################
        ###########################################################
        
		public function insertaDatos($campos,$con,$tb,$cadena,$msj){

			$this->sentencia = "INSERT INTO $tb ($campos) VALUES ($cadena)";

			//echo $this->sentencia;

			$this->stmt = oci_parse($con, $this->sentencia);

			oci_execute($this->stmt);
			
			if ( $msj == 1){

			   echo "El registro se ha almacenado correctamente.";

			}else{

               echo "";

			}

			return $this->stmt;  

		}

        ###########################################################
        ###########################################################

	}

?>
