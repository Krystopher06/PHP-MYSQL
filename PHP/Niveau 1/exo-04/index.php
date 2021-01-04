<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo-04</title>
</head>
<body>
    <h1>Exercice 4</h1>
    
    <h2>Question 1)</h2>

    <?php 

        /*Question 1 :
        Créer une fonction from scratch qui s'appelle premierElementTableau().
        Elle prendra un argument de type array. Elle devra retourner le premier
        élement du tableau.
        Si l'array est vide, il faudra retourner null;  */
            
        
        
        function premierElementTableau($arg){
            if (empty($arg)){
                return null;
            } else{
                return $arg[0];
            }
            
        }
        echo premierElementTableau([68,5,6]);
    

    ?>

    <h2>Question 2)</h2>

    <?php 
        
        /* Question 2 :
        Créer une fonction from scratch qui s'appelle dernierElementTableau().
        Elle prendra un argument de type array. Elle devra retourner le dernier
        élement du tableau.
        Si l'array est vide, il faudra retourner null; */


        function dernierElementTableau($arg){
            if (empty($arg)){
                return null;
            } else{
                return end($arg);
            }
        }

        echo dernierElementTableau([5,6,7,4,8,5,200]);

    ?>




    <h2>Question 3)</h2>


    <?php


        /* Question 3 :
        Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra
        un argument de type array. Elle devra retourner le plus grand des
        élements présent dans l'array.
        Si l'array est vide, il faudra retourner null; */


        function plusGrand($arg){
            if (empty($arg)){
                return null;
            } else{
                return max($arg);
            }
        }

        echo plusGrand([5,10,20,4,6,7,8]);

    ?>

    <h2>Question 3)</h2>

    <?php

        /* Question 4 :
        Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra
        un argument de type array. Elle devra retourner le plus petit des
        élements présent dans l'array.
        Si l'array est vide, il faudra retourner null; */


        function plusPetit($arg){
            if (empty($arg)){
                return null;
            } else{
                return min($arg);
            }
        }

        echo plusPetit([5,10,20,4,6,7,8]);




    ?>



</body>
</html>