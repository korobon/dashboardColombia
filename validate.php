<?php	

require_once("conexion/db.php");

$db = new db();

if($db->open()){
	$condition = "where email='".$_POST['email']."' and pass='".sha1($_POST['pass'])."'";
    $consult = $db->get("*", $condition);    
    if($db->numRows==1){
    	session_start(); 
    	$_SESSION["autentificado"]= "SI"; 
		while($row = mysql_fetch_array($consult)){
    		$_SESSION["userName"]= $row['nombre']; 
    		$_SESSION["userEmail"]= $row['email']; 
    		$_SESSION["userRol"]= ($row['rol'] == 1)?"ADMIN":"INVITED"; 
		}
		echo $db->numRows;
	}
    $db->close();
}

?>