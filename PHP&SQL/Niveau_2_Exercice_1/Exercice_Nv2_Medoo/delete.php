<?php require_once 'dbMedoo.php';?>


<?php
if(isset($_POST['ID'])){
   
    $id = $_POST['ID'];


    $database->delete("utilisateurs",[
        "ID"=>$id,
    ]);
    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php');

}
?>



