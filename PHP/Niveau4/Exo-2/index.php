<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exercice 2</h1>
    <p>Vous pouvez consulter le cours de Pierre Giraud sur ce sujet pour bien comprendre ce que ça implique :
        https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/oriente-objet-encapsulation-public-protected-private/

        Modifiez donc la classe de l'exercice précédent en la dotant d’un constructeur.

        Réalisez les mêmes opérations de création d’objets et d’affichage.</p>

    <h2>Application</h2>
    <br>
    <hr>

    <?php
    class Ville
    {
        private $nom;
        private $departement;
        
        // c'est comme ça qu'on déclare le constructeur de la classe

        public function __construct($nom, $departement){
            $this->nom = $nom;
            $this->departement = $departement;
        }

        public function getInfo()
        {
            $grp = "La ville de '$this->nom' est dans le département: '$this->departement' <br /> ";
            return $grp;
        }
        
    }

    $ville1 =new ville("Grasse",'Alpes-Martimes');
    $ville2 =new ville("Lyon",'Rhône');
    echo $ville1->getinfo();
    echo $ville2->getinfo();
    
    ?>



</body>

</html>