<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 3</h1>

    <h2>Objectif</h2>
    <p>Créer un compteur qui s’incrémente automatiquement à chaque fois qu’une page est visitée.</p>
    <h2>Enoncé</h2>
    <p>Vous devez créer un compteur de visites à l'aide d'un fichier texte. Voici comment vous allez vous y prendre :</p>

    <ul>

    <li>À chaque chargement de la page, le script vérifie si le fichier en question (par exemple compteur.txt) existe.</li>
    <br>    
    <li>Si le fichier existe, le script l'ouvre en lecture, le verrouille, lit la dernière valeur enregistrée (à l'aide de la fonction fread() ), l’enregistre dans une variable et le referme. Il doit ensuite ouvrir le fichier en écriture et écrire la nouvelle valeur qui aura été préalablement incrémentée.</li>
    <br>
    <li> Si le fichier n'existe pas, il faudra l'ouvrir en écriture ce qui aura pour effet de le créer. Il sera alors possible d'y enregistrer la valeur 1 pour une première visite (ou davantage si vous voulez faire croire que votre site est très populaire).</li>
    <br>
    <li>Finalement, le script affichera une phrase du genre "1435 visites sur cette page".</li>
    <br>
    </ul>

    <?php
        function compteurVisite(){
            
            if (file_exists("fichier.txt")){ /* Si le fichier existe, on l'ouvre, on le lit et on le ferme. Ensuite on réouvre notres fichier pour ensuite écrire à l'intérieur la valeur de base ++ (incrémentation) à chaque fois qu'on refresh la page  */
                $monFichier = fopen("fichier.txt", "r"); // On créer une variable "$monFichier" qui contient la fonction fopen() qui permet d'ouvrir le fichier demandé avec sont répertoire. On met "r+" Pour pouvoir lire et écrire dans le fichier ouvert !
                $lecture = fread($monFichier, filesize("fichier.txt"));
                fclose($monFichier);
                $monFichier = fopen("fichier.txt", "w");
                echo "Vous avez visité la page: ".$lecture++." fois"; // incrémentation de la valeur lue d'origine
                fwrite($monFichier,$lecture); // On incrémente  la variable lecture+1
                fclose($monFichier);
                // +1 $lecture a chaque fois qu'on refresh la page
             }else{ /* Si le fichier n'existe pas, on créer le fichier qui n'existe pas  en écrivant à l'intérieur la valeur souhaité  */
                $monFichier = fopen("fichier.txt", "w");
                $txt ="1";
                fwrite($monFichier,$txt);
                fclose($monFichier);
             }  

        }
        compteurVisite();
    ?>

</body>
</html>