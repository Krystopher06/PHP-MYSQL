<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
        




        $date = date("d-m-Y H:i:s");
        if (!isset($_COOKIE["visit"])){
            setcookie("visit", $date, time() + (86400*31), "/");
            echo "<p> Pour la première visite :".$date."</p>";
            
        }else{
           
            $date = $_COOKIE["visit"]."|".$date;
            
            setcookie("visit", $date, time() + (86400*31), "/");
           
            $tab = explode("|",$date); // On demande qu'a partir du moment ou on lit la chaine de caractère "|" il considère qu'il y a une autre chaine de caractère
            echo "<p> Votre nombre de visite est de :".count($tab)."</p>";
            echo"<ul>";
            foreach($tab as $value){
                echo "<li>".$value."</li>";
            }
           
            echo "</ul>";
           
        }

        
    ?>
</head>
<body>
<h1>Exercice 1)</h1>

    <h2>Objectif</h2>
    <ul>
        <li>Manipuler les cookies</li>
        <li>Calculer le nombre de visite d'une page</li>
    </ul>

    <h2>Énoncé :</h2>
    <p>Ecrire un script PHP qui permet de sauvegarder les heures de visites dans un cookie, et affiche les détails des visites</p>
    <br><br>

<h2> Partie pratique: </h2> 

<br><br>


<?php 
    setcookie("visit",$date, time() + (86400*31),"/");
    
    
    

?>




    
</body>
</html>