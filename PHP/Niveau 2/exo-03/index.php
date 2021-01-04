<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 3)</h1>
    <?php
        
            /*
            Exercice n°3 PHP : Le Triangle


            Enoncé
            Créez une fonction qui prend un paramètre de type entier, cela déterminera la hauteur (en lignes) d'un triangle isocèle rempli d'étoiles qu'il faudra afficher à l'écran. Le sommet du triangle sera toujours constitué de 2 étoiles comme dans l'exemple ci-dessous.

            Exemple
            display_triangle(10) ;

            Produira le résultat suivant :

             **
            ****
           ******
          ********
         **********
        ************
       **************
      ****************
     ******************
    ********************

            Le triangle fait 10 lignes de haut. Vous trouverez comment faire pour que le résultat s'affiche bien comme ça en HTML. 
*/



            

        function triangle($hauteur){
            echo "<div style= \"text-align: center\">";
            for($i =1; $i<$hauteur;$i++){
                for($j=0;$j<$i;$j++){
                    echo "**"; // **
                } 
                
                echo "<br>";
                
            }
         echo "</div>";
        }
        triangle(10) // 10
        

        

         












     ?>
</body>
</html>