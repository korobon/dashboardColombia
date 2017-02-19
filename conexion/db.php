<?php

require_once("config.php");

class db {

	private $conexion;
	private $db;
	public $numRows;

	public function open () {
		$this->conexion = mysql_connect(HOST, USER, PASS);
        if ($this->conexion == 0) {
        	DIE("Error conectando con MySQL: " . mysql_error());
        }else{
	        $this->db = mysql_select_db(DBNAME, $this->conexion);
	        if ($this->db == 0) {
	        	DIE("Error conectando con la base datos: " . DBNAME);
	        }
 		}
        return true; 		
	}

	public function close () {
		if ($this->conectar->conexion) {
            mysql_close($this->$conexion);
        }
	}

	public function set($values){ 
        $query = mysql_query("INSERT INTO usuarios (nombre,email,pass,rol) VALUES (".$values.")", $this->conexion);
        if (!$query) echo "Sentencia incorrecta.";
        else {
            return $query;
        }
	}

	public function get($attribute, $condition){ 
		$sql = "SELECT ".$attribute." FROM usuarios ".$condition;
        $query = mysql_query($sql, $this->conexion);
        $this->numRows = mysql_num_rows($query);

        return $query;
	}

	public function del($condition){ 
        $query = mysql_query("DELETE FROM usuarios WHERE ".$condition, $this->conexion);
        if (!$query) echo "Sentencia incorrecta.";
        else {
            return $query;
        }
	}

	public function setUp($attriValue, $condition){ 
        $query = mysql_query("UPDATE usuarios SET $attriValue WHERE ".$condition, $this->conexion);
        if (!$query) echo "Sentencia incorrecta.";
        else {
            return $query;
        }
	}

}

?>