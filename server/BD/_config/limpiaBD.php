<?php
	class limpiaBD{
		public function limpiaDatos($con,$tb){

        $this->sentencia = "TRUNCATE TABLE $tb";

        	echo $this->sentencia;

            $this->stmt = oci_parse($con, $this->sentencia);

            oci_execute($this->stmt);
            
            echo "Truncate ejecutado...";

            return $this->stmt;
		}

        public function liberarDatos(){

        oci_free_statement($this->stmt);
	}
}
?>