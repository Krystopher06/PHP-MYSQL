<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 5)</h1>
<?php





    /* 
        PHP Exercice 5 - Conjugaison

        Enoncé :
        * Créez une fonction qui prend une string en paramètre. Ce paramètre sera un verbe régulier du premier groupe (finissant par "er" tels que parler, trier, chanter, coder, programmer, ...). Votre fonction doit conjuguer ce verbe au présent de l'indicatif et l'afficher à l'écran.

        # Contrainte
        * La chaîne passée en paramètre ne doit pas dépasser 15 caractères ni contenir d'espaces.
        * Vérifiez que la chaîne passée en paramètre se termine bien par "er".

        Exemple :

        En entrée : "programmer"


        En sortie : 

        je programme
        tu programmes
        il programme
        nous programmons
        vous programmez
        ils programment

        Réfléchissez bien à la manière dont vous allez vous y prendre ! Vous pouvez notamment :
        - supprimer des bouts de chaines de caractères
        - concaténer (rajouter à la fin) de nouvelles chaines
        - remplacer un bout de chaine par un autre
        ... une fois que vous savez comment vous allez vous y prendre, recherchez s'il n'existe pas déjà des fonctions toute prêtes en PHP pouvant vous aider.

        Testez ensuite votre code sur de nombreux verbes pour vous assurer que ça fonctionne bien.

        Pour aller plus loin :
        * Essayez de prendre en compte les verbes demandant des traitements particuliers tels que "manger".
    */



    function conjugaison($verbe){
        $nbr = 2; // nombre de caractère
            
           $nVerbe = substr($verbe, 0, -$nbr);
        if(preg_match("/ger/",$verbe)){
        
            
          
            echo "Je ".$nVerbe."e<br>";
            echo "Tu ".$nVerbe."es<br>";
            echo "Il/Elle ".$nVerbe."e<br>";
            echo "Nous ".$nVerbe."eons<br>";
            echo "Vous ".$nVerbe."ez<br>";
            echo  "Ils ".$nVerbe."ent<br>";
         



        }else if(preg_match("/er/",$verbe)){
             
            
          
            echo "Je ".$nVerbe."e<br>";
            echo "Tu ".$nVerbe."es<br>";
            echo "Il/Elle ".$nVerbe."e<br>";
            echo "Nous ".$nVerbe."ons<br>";
            echo "Vous ".$nVerbe."ez<br>";
            echo  "Ils ".$nVerbe."ent<br>";

        }
    }
    conjugaison(strtolower("Programmer"));
    echo "<br>";
    conjugaison(strtolower("Manger"));


/*  if regex => "ger"




    else if regex => "er"
    si le $verbe possède "e" et "r" en dernier caractère
    alors on supprime ces derniers pour ensuite ajouter :
    "je".$verb."e"
    "tu".$verb."es"
    "il".$verbe."e"
    
    "nous".$verbe."ons"
    "vous".$verbe."ez"
    "ils".$verbe."ent"
 





*/









?>
    
</body>
</html>