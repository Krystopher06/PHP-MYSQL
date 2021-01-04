<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Exercice 2</h1>
    <!-- <h2>Objectif :</h2>
    <br>
        <p>Effectuer des opérations sur les tableaux associatifs.</p>
        <br><br>
    <h3>Énoncé :</h3>
    <br>

        <p>On vous propose dans cet exercice un tableau associatif qui contient les notes des étudiants, ce tableau se compose de couples clé => valeur (les clés sont les noms des étudiant et les valeurs représentent les notes).</p>
    <br>

    <P>1] Créer et initialiser un tableau $notes avec les valeurs suivantes :</P>

    <br>

        <table>
            clé
            valeur
            Roger
            12
            Monica
            16
            Najat
            15
        </table>
        <br>

        <P>2. Ajouter au tableau la note 10 pour l’étudiant "Anton".</P>
        <P>3. Supprimer la note de l’étudiante "Monica".</P>
        <P>4. Déterminer la note maximale et la note minimale du groupe.</P>
        <P>5. Afficher le tableau après l'avoir trié par ordre alphabétique.</P>
        <P>6. Classer les étudiants par ordre de mérite (notes décroissantes) et afficher le tableau.</P>
        <P>7. Déterminer la moyenne de la classe.</P>
        <br>
        <p>Après chaque question utilisez les fonctions var_dump ou print_r pour afficher l’état de contenu du tableau.</p>

        <h2>Astuces pour déclarer les tableaux associatifs en PHP</h2>

        <p>         $note = array( "Jean" => 11, "Allan" => 18, "Christelle"=>14, ); // depuis PHP 5.4 déclaration avec [] $note = [ "Joachim" => 8, "Karima" => 17, "Carole"=>15, "Boris"=>8, ]; 
    </p>
 -->



    <p>1. Créer et initialiser un tableau $notes avec les valeurs suivantes :</p>
    <?php
        $notes = ["Roger" => 12, "Monica" => 16, "Najat" => 15,];
        print_r($notes);
        echo "<br>";
    ?>
    <p>2. Ajouter au tableau la note 10 pour l’étudiant "Anton"</p>
    <?php
    $notes = ["Roger" => 12, "Monica" => 16, "Najat" => 15,];
        print_r($notes);
        echo "<br>";
        $notes["Anton"] = 10; // on ajoute la clé Anton à la valeur  10 au tableau $notes
        print_r($notes);
    ?>
    <P>3. Supprimer la note de l’étudiante "Monica".</P>
    <?php
    $notes = ["Roger" => 12, "Monica" => 16, "Najat" => 15,];
        print_r($notes);
        echo "<br>";
        $notes["Anton"] = 10; // on ajoute la clé Anton à la valeur  10 au tableau $notes
        print_r($notes);
        echo "<br>";
        unset($notes["Monica"]);
        // supprimer juste la valeur : $note["Monica"] = null;
        print_r($notes);
    
    ?>
    <P>4. Déterminer la note maximale et la note minimale du groupe.</P>

    <?php
        $notes = ["Roger" => 12, "Monica" => 16, "Najat" => 15,];
        print_r($notes);
        echo "<br>";
        $notes["Anton"] = 10; // on ajoute la clé Anton à la valeur  10 au tableau $notes
        print_r($notes);
        echo "<br>";
        unset($notes["Monica"]);
        print_r($notes);
        echo "<br>";
        echo "<br>";
        print_r("<br> La note max des éleves est de: ".(max($notes)));
        print_r("<br> La note minimale des éleves est de: ".(min($notes)));
        
    ?>

    <P>5. Afficher le tableau après l'avoir trié par ordre alphabétique.</P>
    <?php
        $notes = ["Roger" => 12, "Monica" => 16, "Najat" => 15,];
        print_r($notes);
        echo "<br>";
        $notes["Anton"] = 10; // on ajoute la clé Anton à la valeur  10 au tableau $notes
        print_r($notes);
        echo "<br>";
        unset($notes["Monica"]);
        print_r($notes);
        
        print_r("<br> La note max des éleves est de: ".max($notes));
        print_r("<br> La note minimale des éleves est de: ".min($notes));
        echo "<br>";
        echo "<br>";

        echo "Ordre alphabetique: ";
        ksort($notes); // Pour trier par clé k=(key) les clés (nom)
        print_r($notes);
      
    ?>

    <P>6. Classer les étudiants par ordre de mérite (notes décroissantes) et afficher le tableau.</P>
      <?php
        $notes = ["Roger" => 12, "Monica" => 16, "Najat" => 15,];
        print_r($notes);
        echo "<br>";
        $notes["Anton"] = 10; // on ajoute la clé Anton à la valeur  10 au tableau $notes
        print_r($notes);
        echo "<br>";
        unset($notes["Monica"]);
        print_r($notes);
        print_r("<br> La note max des éleves est de: ".max($notes));
        print_r("<br> La note minimale des éleves est de: ".min($notes));
        echo "<br>";
        echo "Ordre alphabetique: ";
        ksort($notes);
        print_r($notes);
        echo "<br>";
        echo "<br>";
        arsort($notes); // Note décroissante associatifs
        print_r($notes);
    ?>

    <P>7. Déterminer la moyenne de la classe.</P>
      <?php
        $notes = ["Roger" => 14, "Monica" => 16, "Najat" => 15,];
        print_r($notes);
        echo "<br>";
        $notes["Anton"] = 10; // on ajoute la clé Anton à la valeur  10 au tableau $notes
        print_r($notes);
        echo "<br>";
        unset($notes["Monica"]);
        print_r($notes);
        print_r("<br> La note max des éleves est de: ".max($notes));
        print_r("<br> La note minimale des éleves est de: ".min($notes));
        echo "<br>";
        echo "Ordre alphabetique: ";
        ksort($notes);
        print_r($notes);
        echo "<br>";
        arsort($notes); // Note décroissante associatifs
        print_r($notes);
        echo "<br>";
        echo "<br>";
        
        print(array_sum($notes));  // On cumule la valeur de chaque éléments : (39)
        
        echo "<br>";
        echo "<br>";
        print_r(count($notes)); // compte tout les éléments qu'il y a dans le tableau (3)
        echo "<br>";
        echo "<br>";
        echo "array_sum(notes)/count(notes) = 39/3 = 13";
        echo "<br>";
        echo "<br>";
        $moyenne = array_sum($notes)/count($notes); // on cumule les valeurs de "$notes" avec "array_sum()" et on divise / par les éléments du tableau "count()"
        print_r("La moyenne est de ".$moyenne);    // array_sum($notes)/count($notes) = 13

    ?>


</body>
</html>