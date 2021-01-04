<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

/* Question 1 :
Faite en sorte que la fonction HelloWorld retourne exactement la valeur
Hello World! */


    function helloWorld(){
        return "Hello world ! <br>";
    }
    echo helloWorld();
    echo helloWorld();
    echo helloWorld();
    echo helloWorld();
    ?>

<?php


/* Question 2 :
Créer une fonction from scratch qui s'appelle quiEstLeMeilleurProf().
Elle doit retourner "Mon super formateur de dev web" */

    function quiEstleMeilleurProf(){
        return "Mon super formateur de dev web !";
    }

    echo quiEstleMeilleurProf();
?>


<?php
/* Question 3 :
 Créer une fonction from scratch qui s'appelle jeRetourneMonArgument().
Exemple : argument = "abc" ==> return abc
arg = 123 ==> return 123  */



    function jeRetourneMonArgument($argument){
      
        return $argument;

     
    }
    echo jeRetourneMonArgument("ABC");
?>

<?php

/* Question 4 :
**
Créer une fonction from scratch qui s'appelle concatenation(). Elle
prendra deux arguments de type string. Elle devra retourner la
concatenation des deux.
Exemple :
argument 1 = "Kingsley"
argument 2 = "Coman"
Resultat : "KingsleyComan" 
**
*/

function concatenation($nom,$prenom){
    $result = $nom.$prenom;
    return $result;
    
}
concatenation("Kingsley","Coman");


?>
</body>
</html>








