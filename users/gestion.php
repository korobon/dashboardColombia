<?php

require_once("../conexion/db.php");

$db = new db();

if($db->open()){

    switch($_GET['process']) {
        case "new":            
			$query = $db->set("'".$_POST['nombre']."','".$_POST['email']."','".sha1($_POST['pass'])."','".$_POST['rol']."'");
		    $db->close();
            echo $query;
        break;
        case "get":
        	echo selecte($db, $data);
        break;
        case "getAll":
        	$result = $db->get("*", "");
        	$table = "";
			while($row = mysql_fetch_array($result)){
        		$table .= '  
                        <tr class="">
                          <td class="">'.$row['nombre'].'</td>
                          <td class="">'.$row['email'].'</td>
                          <td class="">'.(($row['rol'] == 1)?"ADMIN":"INVITED").'</td>
                          <td class="">
                          <a class="all" href="#" data-process="del" data-id="'.$row['id'].'"><i class="fa fa-times icon"></i></a>
                          <a class="all" href="#" data-process="up" data-id="'.$row['id'].'" data-toggle="modal" data-target="#modalUser"><i class="fa fa-pencil-square-o icon"></i></a>
                          </td>
                        </tr>
				';
			}
    		$db->close();
			echo $table;
        break;
        case "up":         
			if($_GET['get']){
				$condition = "where id='".$_GET['id']."'";
				$query = $db->get("*", $condition);
				$row = mysql_fetch_array($query);
		    	echo json_encode($row);
			}else{				
				$password = (!empty($_POST['pass']))?"pass='".sha1($_POST['pass'])."'":"";
				$attriValue = "nombre='".$_POST['nombre']."', email='".$_POST['email']."', rol='".$_POST['rol']."'".$password;
				$condition = "id='".$_POST['id']."'";
				echo $db->setUp($attriValue, $condition);
			}
		    $db->close();
        break;
        case "del":
			$condition = "id='".$_GET['id']."'";
			$query = $db->del($condition);
			$db->close();
            echo $query;
        break;
        default:                    
            echo false;
    }
}

?>