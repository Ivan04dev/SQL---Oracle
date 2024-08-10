<?php

    class consultaBD{

        ###########################################################
        ###########################################################

        public function consultaDatos($con,$par,$tb,$cadena){

        	$this->sentencia = "SELECT $par FROM $tb $cadena";

        	//echo $this->sentencia;

            $this->stmt = oci_parse($con, $this->sentencia);

            $this->exe = oci_execute($this->stmt);
  
            return $this->stmt;    
        

            #$this->array = oci_fetch_all($this->stmt);

        }

        // DISTINCT después del SELECT 
        public function consultaDatosDistinct ($con,$par,$tb,$cadena){

                $this->sentencia = "SELECT DISTINCT $par FROM $tb $cadena";

                //echo $this->sentencia;

                $this->stmt = oci_parse($con, $this->sentencia);

                $this->exe = oci_execute($this->stmt);
    
                return $this->stmt;    
            

                #$this->array = oci_fetch_all($this->stmt);

        }

        // JOIN después de la tabla 
        public function consultaDatosJoin($con, $par, $tb1, $tb2, $join_condicion, $condiciones) {

            // Construye la sentencia SQL con JOIN y condiciones opcionales
            $this->sentencia = "SELECT $par FROM $tb1 JOIN $tb2 ON $join_condicion";
    
            if (!empty($condiciones)) {
                $this->sentencia .= " WHERE $condiciones";
            }
    
            // Agrega el ordenamiento por sucursal
            $this->sentencia .= " ORDER BY s.sucursal";
    
            // Prepara la consulta SQL
            $this->stmt = oci_parse($con, $this->sentencia);
    
            // Ejecuta la consulta
            $this->exe = oci_execute($this->stmt);
    
            return $this->stmt;
        }

        ##########################################################
        ##########################################################

        public function liberarDatos(){

        	oci_free_statement($this->stmt);

        }

        ##########################################################
        ##########################################################

    }

    /*
    class consultaBD extends conexionBD{
 
        public function consulta(){

        	parent::__construct();

        }

        public function consultaDatos($tb,$cadena){

        	$this->sentencia = "SELECT * FROM $tb $cadena";

            $this->stmt = oci_parse($this->conexion, $this->sentencia);

            oci_execute($this->stmt);

            $this->array = oci_fetch_array($this->stmt);

            return $this->array;

        }

    }
    */
?>