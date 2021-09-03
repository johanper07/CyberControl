<?php
class conexion{
    //declarar las variables 
    
    private $servidor;
    private $usuario;
    private $clave;
    private $basesDatos;
    private $conectar;
    
    //funciones que no estan dentro sd esas variables
    
    //este es la funcion constructor 
    function conexion($s,$u,$c,$b){
        
        $this ->$servidor = $s;
        $this->usuario =$u;
        $this->clave =$c;
        $this->basesDatos =$b;
        $this->conectarAMysql();
        $this->seleccionarBaseDeDatos();
    }
    
    private function conectarAMysql(){
        $this->conectar = mysql_connect($this ->$servidor,  $this->$usuario, $this->clave  or die (mysqli_errno));
    }
    private function seleccionarBaseDeDatos(){
        mysqli_select_db($this->basesDatos) or die (mysql_error);
    } 
    
    public function consultar($sql){
        $resultado = mysql_query ($sql, $this->conectar); //escribir codigo sql 
        return $resultado;
    }
    
    //funciones para rabajar con la base de datos
    public  function NFilas($sql){
        return mysql_num_rows($sql);
    }
    public function NColumnas($sql){
        return mysql_num_fields($sql);
    }
    public function NomCampo($sql){
        return mysql_field_name ($sql,$i);
    }
}

?>