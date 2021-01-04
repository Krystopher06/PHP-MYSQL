<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exo 5</title>
</head>
<body>
    <h1>Exercice 5</h1>

    <h2>Question 1)</h2>


    <?php 

        /* Question 1 :
        Créer une fonction from scratch qui s'appelle verificationPassword().
        Elle prendra un argument de type string. Elle devra retourner un boolean
        qui vaut true si le password fait 8 caractères ou plus et false si il
        fait moins. */


        function verificationPassword($arg){
            if(strlen($arg)>=8){
                return true;
            }else{
                return false;
            }
        }
        echo verificationPassword("krystopher")
    
    ?>
        <h2>Question 2)</h2>


    <?php 

        /* Question 2 :
        On améliore la verificationPassword() écrite précédemment. Elle prend
        toujours un argument de type string. Elle devra désormais retourner un
        boolean qui vaut true si le password respecte toutes les règles suivantes
        :
        * Faire au moins 8 caractères
        * Avoir au moins 1 chiffre
        * Avoir au moins une majuscule et une minuscule
        Et false dans tous les autres cas.. */


        function verificationPassword2($arg){
            if(preg_match("/[A-Z]{1}/",$arg) && preg_match("/[a-zA-Z]/",$arg) && preg_match("/[0-9]{1,}/",$arg) && strlen($arg)>=8){
                return "true";
            }else{
                return "false";
            }
        }
        echo verificationPassword2("Kraazeazezer");
        //regex = (preg_match ( partern , $var))
        //regex && regex && regex && strlen($arg)>=8

    ?>

        <h2>Question 3)</h2>

    <?php 
        /* Question 3 :
        Créer une fonction from scratch qui s'appelle capital(). Elle prendra un
        argument de type string. Elle devra retourner le nom de la capitale des
        pays suivants :
        * France ==> Paris
        * Allemagne ==> Berlin
        * Italie ==> Rome
        * Maroc ==> Rabat
        * Espagne ==> Madrid
        * Portugal ==> Lisbonne
        * Angleterre ==> Londres
        * Tout autre pays ==> Inconnu
        Il faudra utiliser la structure SWITCH pour faire cette exercice.
        Bonus : Faîtes en sorte de gérer le nom nom des pays indépendamment de la
        casse (majuscules/minuscules). */
    //V1
    /*         
        function capital($ville){
            $ville = strtolower($ville);
            switch ($ville) {
                case "france":
                    echo "Paris";
                break;
                case "allemagne":
                    echo "Berlin";
                break;
                case "italie":
                    echo "Rome";
                break;
                case "maroc":
                    echo "Rabat";
                break;
                case "espagne":
                    echo "Madrid";
                break;
                case "portugal":
                    echo "Lisbonne";
                break;
                case "angleterre":
                    echo "Londres";
                break;
                default:
                    echo "Cette capital n'est pas assigné";
                break;
                
            } 
        }
            capital("ITALIE");
    */
    //V2
        function capital($ville){
            $ville = strtolower($ville); // tout ce qu'on écrira deviendra obligatoirement en minuscule pour les cases
            switch ($ville) {
                case "france":
                    return "Paris";
            
                case "allemagne":
                    return "Berlin";
                
                case "italie":
                    return "Rome";
                
                case "maroc":
                    return "Rabat";
            
                case "espagne":
                    return "Madrid";
                
                case "portugal":
                    return "Lisbonne";
                
                case "angleterre":
                    return "Londres";
            
                default:
                    return "Cette capital n'est pas assigné";
            } 
        }
        echo capital("fRaNcE"); //même si on écris en majuscule, il sera renvoyé en minuscule
    ?>



    <h2>Question 4)</h2>

    <?php 
    
        /* Question 4 :
        Créer une fonction from scratch qui s'appelle listHTML(). Elle prendra
        deux arguments :
        * Une string représentant le nom de la liste
        * Un array représentant les élements de cette liste
        Elle devra retourner une liste HTML. Chaque element de cette liste
        viendra du tableau passé en paramètre.
        Exemple :
        Argument titre : "Capitale"
        Argument liste : ["Paris", "Berlin", "Moscou"]
        Résultat :
        "<h3>Capitale</h3><ul><li>Paris</li><li>Berlin</li><li>Moscou</li></ul>"
        Comme vous pouvez le voir il n'y a pas d'espace ni de retour à la ligne
        entre les élements de la liste. Pas d'espace non plus entre le titre et
        la liste.
        Contraintes :
        * Si le titre est null ou vide, il faut que la fonction retourne null.
        * Si l'array est vide (0 élément), il faut que la fonction retourne null. */


        /* 
              $titre = string
            $list = array => value = ["aeaz","azeae","azeea"]


        */


        function listHTML($titre,$list){
         
            if(empty($titre)||empty($list)){
                echo "null"; 
            return null;
            }else{
                echo "<h3>".$titre."</h3><ul>";
                foreach($list as $value){
                    echo "<li>".$value."</li>";
                }
                echo "</ul>";
            }
        
        }
         listHTML("",["dddddddddddd","zaeaea","aeazea","aeeeeeeeeeee","azeeeeee"]);





        //Version Marie
        /* 
         function listHTML($listname,$arrayelements){
            $resultat="<h3>$listname</h3>";
            $resultat.="<ul>";
            foreach($arrayelements as $element){
                $resultat.="<li>$element</li>";
            }
            $resultat.="</ul>";
        return $resultat;
        }
        echo "<br>".listHTML('Capitale',["Berlin","Paris","Moscou"]);

         */




        
        
        
        
        
        //Version marine
        /* 
        function listHTML( $pays, $ville){

            if (($pays==null) || ($ville==null))  {

                echo "il y a rien";
                return false;// false sert à rien mais c'est plus compréhensible.

            } else {
                //return "<h3>".$pays."</h3><ul><li>".$ville[0]."</li><li>".$ville[1]."</li><li>".$ville[2]."</li></ul>";

                echo "<h3>".$pays."</h3><ul>"; // sinon tu ecrit la var pays en h3 tu commence un liste
                for ($i=0; $i < count($ville); $i++) { // bouble for car le tableau peu etre evolutif 
                    echo "<li>".$ville[$i]."</li>";//affiche le contenu du tableau sous format li
                }
                echo "</ul>";// fin de mon tableau.
            }    
        }

        $pays = 'France';
        $ville = ['Bondy','Bargème','Grasse'];

        echo listHTML('France', ['Bondy','Bargème','Grasse']);
        echo listHTML($pays,$ville); */















    ?>




        <h2>Question 5)</h2>



    <?php

        /* Question 5 :
        Créer une fonction from scratch qui s'appelle remplacerLesLettres(). Elle
        prendra un argument de type string. Elle devra retourner cette même
        string mais en remplacant les "e" par des "3", les "i" par des "1" et les
        "o" par des "0"
        Exemple :
        argument : "Bonjour les amis" ==> Output : "B0nj0ur l3s am1s"
        argument : "La programmation Web est trop cool" ==> Output : "La
        pr0grammat10n W3b 3st tr0p c00l" */



        function remplacerLesLettres($arg){
           
            $replace1 =  array("e","i","o"); //on let met dans l'ordre par index
            $replace2 =  array("3","1","0");
            $result =  str_ireplace($replace1,$replace2,$arg);
            return $result;
        }
        echo remplacerLesLettres("Bonjour ! Je m'apelle Krys ! Je suis de grasse !")

    ?>



        <h2>Question 6)</h2>

    <?php

            /*  Question 6 :
                Créer une fonction from scratch qui s'appelle quelleAnnee(). Elle devra
                retourner un integer representant l'année actuelle.
                Cherchez en PHP comment on intéragit avec les dates ! */

            //idate — Formate une date/heure locale en tant qu'entier
            //date — Formate une date/heure locale

            // On va utiliser iDate

            function quelleAnnee(){
            
                
                return idate("Y");
            }
            echo quelleAnnee()
        



            /* function quelleAnnee(){
            $annee =date("Y");
                
                return $annee;
            }
            echo quelleAnnee(); */




    ?>

            <h2>Question 7)</h2>

    <?php


            /* Question 7 :
            Créer une fonction from scratch qui s'appelle quelleDate(). Elle devra
            retourner une string representant la date actuelle sous le format suivant
            DD/MM/YYYY
            Où DD représente le jour actuel, MM le mois actuel et YYYY l'année
            actuelle. Là encore, cherchez comment en PHP on intéragit avec les dates. */



            function quelleDate(){
                return date("d/m/Y");
            }
            echo quelleDate();







    ?>


























































































<!-- 









        <h4>Question 1 :</h4>
<p>Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. Elle devra retourner un boolean qui vaut true si le password fait 8 caractères ou plus et false si il fait moins.</p>

<?php
/* 
$monMotDePasse = "Moua"; // test avec 2variables
$deuxMot = "Deux mots";

function verificationPassword(string $password){ // condition de mon parametre est un string

    $lenghtString = strlen($password);// calcul longueur de mon parametre
    $countWord = str_word_count($password);// calcul du nbr de mot utilisé

    if (($lenghtString >= 8) && ($countWord == 1)) {// la longueur doit etre minimal à 8 & en 1 seul mot.
        echo "Votre mot de passe est correct : ".$password."<br>";
        return $password;
    } else {
        echo "Votre mot de passe est incorrect.<br>";
        return false;
    }    
}
// test
echo verificationPassword($monMotDePasse);
echo verificationPassword($deuxMot).".<br>";
echo verificationPassword("bnfkbkbklbl").".<br>";
echo verificationPassword(15478545865).".<br>";
echo verificationPassword("unseulmot").".<br>";
echo verificationPassword("13 54 536").".<br>"; */
?>

<hr>

<h4>Question 2 :</h4>
<p>On améliore la verificationPassword() écrite précédemment. Elle prend toujours un argument de type string. Elle devra désormais retourner un boolean qui vaut true si le password respecte toutes les règles suivantes:* Faire au moins 8 caractères* Avoir au moins 1 chiffre* Avoir au moins une majuscule et une minuscule Et false dans tous les autres cas.</p>

<?php
/* 
function conditionPassword(string $password){

    $point=0;
    $point_min=0;
    $point_maj=0;
    $point_chiffre=0;
    $point_caracteres=0;

    $lenghtString = strlen($password);
    $countWord = str_word_count($password);

    for ($i=0; $i < $lenghtString ; $i++) { /// boucle for pour que tout mon mot de passe soit analysé

        $lettre = $password[$i];// nouvelle var pour selectionner une lettre par une lettre

        if ($lettre >= 'a' && $lettre <= 'z') { // je fait ma vérification du MDP par un compteur de point.

            $point_min = 1;

        } else if ($lettre >= 'A' AND $lettre <= 'Z') {

            $point_maj = 2;

        } else if ($lettre >= '0' AND $lettre <= '9') {

            $point_chiffre = 3;

        } else {

            $point_caracteres = 5;// non utile pour cet exo mais utile pour plus tard... ds la format°.

        }       
        }

    $calculPoint = $point_min + $point_maj + $point_chiffre + $point_caracteres;// total de point

    if (($calculPoint>=6) AND ($lenghtString >= 8)) {//j'estime qu'il faut un minimum de 6 point maj=2 chiffre = 3 et min = 1
        echo "Votre mot de passe rempli les conditions est ai donc validé.";
    } else {
        echo "Mot de passe non valide.";
    }
        
    }

echo conditionPassword($monMotDePasse).".<br>";
echo conditionPassword("aB1coucou").".<br>";
echo conditionPassword("aB1cou").".<br>";
echo conditionPassword("aBcoucou").".<br>";
 */
?>

<hr>

<h4>Question 3 :</h4>
<p>Créer une fonction from scratch qui s'appelle capital(). Elle prendra un argument de type string. Elle devra retourner le nom de la capitale des pays suivants :* France ==> Paris* Allemagne ==> Berlin* Italie ==> Rome* Maroc ==> Rabat* Espagne ==> Madrid* Portugal ==> Lisbonne* Angleterre ==> Londres* Tout autre pays ==> Inconnu Il faudra utiliser la structure SWITCH pour faire cette exercice.Bonus : Faîtes en sorte de gérer le nom nom des pays indépendamment de lacasse (majuscules/minuscules).</p>

<?php
/* function capital(string $pays){
switch ($pays) {
    case 'france':
        echo "La capitale de la FRANCE est Paris.";
        break;
    case 'espagne':
        echo "La capitale de l'ESPAGNE est Madrid.";
        break;
    case 'portugal':
        echo "La capitale du Portugal est Lisbonne.";
        break;
    case 'allemagne':
        echo "La capitale de l'ALLEMAGNE est Berlin.";
        break;
    case 'italie':
        echo "La capitale de l'ITALIE est Rome.";
        break;
    case 'maroc':
        echo "La capitale du MAROC est Rabat.";
        break;
    case 'angleterre':
        echo "La capitale de l'ANGLETERRE est Londres.";
        break;
    default:
        echo "INCONNU";
        break;
}
return $pays;
}
print (capital (strtolower('France')))."<br>"; // retourne la variable en minuscule
echo (capital (strtolower('alleMAgne')))."<br>";
echo (capital (strtolower('Russie')))."<br>";
echo (capital (strtolower('PORTUGAL')))."<br>"; */
?> -->

</body>
</html>