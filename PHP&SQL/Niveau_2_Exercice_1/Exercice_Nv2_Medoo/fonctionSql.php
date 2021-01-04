<?php 
 require_once 'dbMedoo.php';


function getUsers(){
    return  $database->select("utilisateurs","*"
        );
      
}
var_dump(getUsers());


?>