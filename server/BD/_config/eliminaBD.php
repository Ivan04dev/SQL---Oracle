<?php

	class eliminaBD{

		public function eliminaDatos($con,$tb,$cadena){

            $this->sentencia = "DELETE FROM $tb $cadena";

        	#echo $this->sentencia;

            $this->stmt = oci_parse($con, $this->sentencia);

            oci_execute($this->stmt);

            echo "El registro se eliminó correctamente.";
  
            return $this->stmt;
		}

        public function liberarDatos(){

            oci_free_statement($this->stmt);
	   
        }

    }

?>