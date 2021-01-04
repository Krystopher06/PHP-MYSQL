<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 2)</h1>
    <?php
        /* 
            Exercice n°2 PHP : Inverser une chaîne de caractères

            Créez une fonction qui prend en paramètre une chaine de caractères et qui retourne cette même chaine de caractères mais exactement inversée. Vous afficherez le résultat à l'aide d'un echo pour contrôler. 

            Exemple :
            reverse_string("abcdef GHI") ;

            doit afficher "IHG fedcba" ;

            Indications:
            - Vous pouvez parcourir la première chaine de caractères et concaténer les caractères lus "à gauche" de la nouvelle chaine de caractères
            - Ou alors vous pouvez parcourir la première chaine "à l'envers" (en partant de la fin) et construire la nouvelle chaine en concaténant normalement les caractères lus. 
            
        */
        
        
        //v1
        function reverse($string){
            echo $string."<br>";
           echo strrev("$string");
        }
        reverse("Salut");

        //v2
        /*  
        function reverse($string){
            
            return strrev("$string");
        }
        echo "Salut ".reverse("Salut");
        */

        
        //V3 rémi
        /* 
            function reverse_str($str){
				$length = strlen($str);
				$newStr = "";
				for($i=$length;$i>=0;$i--){
					$newStr .= $str[$i];
				}
				echo $str;
				echo "<br>";
				echo $newStr;
			}
			
            reverse_str("oiqzief rqeon"); 
        */








    ?>
</body>
</html>