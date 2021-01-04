<?php
session_start();
if(isset($_SESSION["user_mail"])){
unset($_SESSION["user_mail"]);
header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice%201/login.php');
        exit(); 
session_destroy();
}else{
    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice%201/login.php');
        exit(); 

}
?>
<script>
window.location.href='login.php';
</script>
