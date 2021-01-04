<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo-03</title>
</head>
<body>
    <h1>Exercice 3</h1>
    <br>
    <br>

    <h2>Question 1)</h2>

    <?php
        /* Question 1 :
        Créer une fonction from scratch qui s'appelle estIlMajeur(). Elle prendra
        un argument de type int. Elle devra retourner un boolean.
        Si age >= 18 elle doit retourner true
        si age < 18 elle doit retourner false
        Exemple :
        age = 5 ==> false
        age = 34 ==> true */



        function estIlMajeur($age){
            if($age >= 18){
                return true;
                
            }else{
                return false;
            }
        }
        $result = estIlMajeur(18);
         var_dump($result);

        /* function estIlMajeur($age){
            if($age >= 18){
                return "Il est majeur";
                
            }else{
                return "Il est mineur";
            }
            
        }
        echo estIlMajeur(20) */
    ?>

    <h2>Question 2)</h2>

    <?php
        /* Question 2 :
        Créer une fonction from scratch qui s'appelle plusGrand(). Elle prendra
        deux arguments de type int. Elle devra retourner le plus grand des deux.  */


        function plusGrand($value1,$value2){
           if($value1 > $value2){
               return $value1;
           }else{
               return $value2;
           };
        };
        echo plusGrand(20,50)
    ?>

    <h2>Question 3)</h2>
    <?php
        /* Question 3 :
        Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra
        deux arguments de type int. Elle devra retourner le plus petit des deux. */


        function plusPetit($val1,$val2){
            if($val1 < $val2){
                return $val1;
            }else{
                return $val2;
            };
        };
        echo plusPetit(20,50)
    ?>

    <h3>Question 4)</h3>

    <?php 
        /* Question 4 :
        Créer une fonction from scratch qui s'appelle lePlusPetit(). Elle prendra
        trois arguments de type int. Elle devra retourner le plus petit des
        trois. */

        
        /* *
        V1
        * */
        function lePlusPetit($arg1,$arg2,$arg3){
            if( $arg1 < $arg2 && $arg1 < $arg3){
                return $arg1;
            }else if ( $arg2 < $arg1 && $arg2 < $arg3){
                return $arg2;
            }else if($arg3 < $arg1 && $arg3 < $arg2) {
                return $arg3;
            };
        }
        echo lePlusPetit(100,50,20) 
       





        //Cette fonction en dessous, utilise la fonction de la question 3 (plusPetit)
        /*   function lePlusPetit($arg1,$arg2,$arg3){
            $lpp1 = plusPetit($arg1,$arg2);
            $lpp2 = plusPetit($arg2,$arg3);
            return plusPetit($lpp1,$lpp2);
            }
            echo lePlusPetit(4,5,6); */
        
        ?>


            <!-- <?php 
            /* function lePlusPetit($arg1,$arg2,$arg3){
             return min($arg1,$arg2,$arg3); // min() récupère la valeur la plus basse
            }
            echo lePlusPetit(10,5,6); */
            
            
            ?> -->


</body>
</html>