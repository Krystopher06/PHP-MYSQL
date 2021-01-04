<?php  session_start(); ?>  
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        
        if(isset($_SESSION["user_mail"])){
            
            echo "<p> Bienvenue ".($_SESSION["user_mail"])."</p>"  ; 
        
        }else{
            echo "Vous n'êtes pas connectée";
        }
        ?>
        
        <a href="http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/login.php">Logout </a>
        
        
    
</body>
</html>