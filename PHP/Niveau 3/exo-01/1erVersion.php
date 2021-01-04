<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php

    

/*     $jour = date("d");
    $mois = date("m");
    $annee = date("Y");
    $date = "".$jour."/".$mois."/".$annee; */
    $date = date("d-m-Y H:i:s <br>");
    

    echo $date;

    if(!isset($_COOKIE["visit"])){
        $arr = $date;
        setcookie("visit",$date, time() + (86400*31),"/");
    }else{
        $date = $_COOKIE["visit"].$date."<br>";
    }

    setcookie("visit",$date, time() + (86400*31),"/");
    

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

    echo "<p> Pour la première visite : ".date("d-m-Y H:i:s")."  </p>";

    


    /* if(isset($_COOKIE["visit"]))
    {
       echo $_COOKIE['visit'];
    }
    else
    {
        echo "C'est la première fois que vous visitez cette page";
    } */
    



?>

<?php
    
    echo "<br><br><br>"."<p> Par la suite affiche la liste des heures : </p>";


if (isset($_COOKIE["visit"])){
            
        echo "<p>Vous avez visité ce site ". (count($arr) + 1) . "</p>";
        echo $_COOKIE["visit"]."<br>"."<br>";
        
    }else{
        echo 'Le cookie n\'existe pas <br />';
    }


?>




</body>
</html>