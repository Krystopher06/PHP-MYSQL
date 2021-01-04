<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2</title>
</head>
<body>
<h1>Exercice 2 NV 1</h1>
<h2>1)</h2>
<?php
    /*Question 1 :
    Créer une fonction from scratch qui s'appelle somme(). Elle prendra deux
    arguments de type int. Elle devra retourner la somme des deux.
    Exemple :
    argument 1 = 5
    argument 2 = 6
    resultat : 11  */

    function somme($arg1,$arg2){
        $result = $arg1 + $arg2;
        return "<p> Le resultat de mon addition est $result <br><br></p>" ;
    }
    echo somme(10,6)
?>

<h2>2)</h2>
<?php
/* Question 2 :
Créer une fonction from scratch qui s'appelle soustraction(). Elle
prendra deux arguments de type int. Elle devra retourner la soustraction
des deux.
Exemple :
argument 1 = 5
argument 2 = 4
Resultat : 1 */

function soustraction($arg1,$arg2){
    $result = $arg1 - $arg2;
    return "<p> Le resultat de ma soustraction  est $result <br><br></p>" ;
}
echo soustraction(10,6)

?>



<h2>3)</h2>



<?php
/*Question 3 :
Créer une fonction from scratch qui s'appelle multiplication(). Elle
prendra deux arguments de type int. Elle devra retourner la
multiplication des deux.
Exemple : argument 1 = 5
argument 2 = 4
Resultat : 20  */

function multiplication($arg1,$arg2){
    $result = $arg1 * $arg2;
    return "<p> Le resultat de ma multiplication  est $result <br><br></p>" ;
}
echo multiplication(3,5)




?>
</body>
</html>