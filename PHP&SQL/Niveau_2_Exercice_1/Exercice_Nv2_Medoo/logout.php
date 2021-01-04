<?php
session_start();
if(isset($_SESSION["prenom"])){
unset($_SESSION["prenom"]);
header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/login.php');
session_destroy();
exit(); 

}else{
    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/login.php');
    session_destroy();
    exit(); 


}
?>
<script>
window.location.href='Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/login.php';
</script>
