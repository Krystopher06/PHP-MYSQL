<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Exercice 1</h1>

<?php





/* 
    function nombre($number){
        while ($number !== 1){
            if($number%2 == 1){
                $number * 3 + 1;
                echo "$number est impair";
            }else{
                $number/2;
                echo "$number";
            }
            

        }
    } */




















    /* Exercice PHP n°1 - La Conjecture de Syracuse


    Inventée par Lothar Collatz (1910 - 1990)

    Il s'agit d'une séquence très simple d'opérations sur les nombres qui ramène toujours au même endroit, le nombre 1. D'abord un amusement, cette étonnante suite est devenue troublante pour les mathématiciens qui ne se lassent pas de l'explorer sans avoir encore réussi à la domestiquer.

    Voir la représentation avec l'image ci-jointe.

    # Ennoncé de l'exercice
    Créez une fonction PHP qui prend comme argument n'importe quel nombre entier supérieur à zéro (faîtes les tests nécessaires pour garantir la validité de l'argument).

    Tant que ce nombre est différent de 1 : 
    * S'il est pair divisez-le par 2.
    * S'il est impair multipliez-le par 3 et ajoutez 1. 

    Au final votre fonction doit afficher une série de nombres, le dernier de ces nombres doit être obligatoirement 1. La fonction réalisera des 'echo' de chaque étape intermédiaire.

    Exemple :

    Valeur de départ : 25
    


    Affichage attendu :

    25 76 38 19 58 29 88 44 22 11 34 17 52 26 13 40 20 10 5 16 8 4 2 1


    En savoir plus sur la conjecture de Syracuse :
    http://villemin.gerard.free.fr/Wwwgvmm/Iteration/Syracuse.html

    */






//Créez une fonction PHP qui prend comme argument n'importe quel nombre entier supérieur à zéro (faîtes les tests nécessaires pour garantir la validité de l'argument).


    

        



    function nombre($number){
        
        while ($number !== 1){
            if($number%2 == 1){
               $number =  $number * 3 + 1;
               echo $number."<br>";
            }else{
                $number = $number/2;
                echo $number."<br>";
            }
        }
    }
    nombre(25)




















?>












</body>
</html>