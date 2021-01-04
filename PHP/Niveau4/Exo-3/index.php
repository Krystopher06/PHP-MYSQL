<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exercice 3</h1>
    <p>Enoncé :

Créez une classe représentant une personne. Elle doit avoir les propriétés nom, prénom et adresse, ainsi qu’un constructeur et un destructeur. Jusqu'à présent vous n'aviez pas eu à écrire le code d'un destructeur, vous pouvez trouver toutes les infos à ce sujet sur le cours d ePierre Giraud :
https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/oriente-objet-constructeur-destructeur/

Le code du constructeur et du destructeur vous est fourni.
Vous ajouterez une méthode getPersonne() qui doit retourner les coordonnées complètes de la personne. 
Une méthode setadresse() doit permettre de modifier l’adresse de la personne. 

Créez enfin plusieurs objets personne en leur attribuant toutes les informations nécessaires, et utilisez l’ensemble des méthodes.</p>

    <h2>Application</h2>
    <br>
    <hr>
    


    <?php
class personne
{
	private $nom;
	private $prenom;
	private $adresse;

	//Constructeur
	public function __construct($nom, $prenom, $adresse)
	{
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->adresse=$adresse;
	}

	//Destructeur
	public function __destruct()
	{
		echo "<script type=\"text/javascript\">alert('La personne nommée $this->prenom $this->nom \\n est supprimée de vos contacts')</script>";
	}

	public function getPersonne()
	{
        
        $grp ="La personne nommée $this->prenom $this->nom habitant au $this->adresse est supprimé de vos contact ! <br>";
        return $grp;

	}

	public function setadresse($a)
	{
        
        return $this->adresse=$a;
	}
}

//Création d'objets
$client1 = new personne("Geelsen","Jan"," 145 Rue du Maine Nantes");
echo $client1->getPersonne();

//Modification de l'adresse
$client1->setadresse("23 Avenue Foch Lyon");
echo $client1->getPersonne();

//Suppression explicite du client1, donc appel du destructeur
unset($client1);
//Fin du script
echo "Fin du script <br><br>";


$client2 = new personne("Logez","Krystopher"," 145 ");
echo $client2->getPersonne();

//Modification de l'adresse
$client2->setadresse("23 Avenue");
echo $client2->getPersonne();

//Suppression explicite du client2, donc appel du destructeur
unset($client2);
//Fin du script
echo "Fin du script <br><br> ";


$client3 = new personne("LOGEZ","Marc","Maine Nantes");
echo $client3->getPersonne();

//Modification de l'adresse
$client3->setadresse("23 Lyon");
echo $client3->getPersonne();

//Suppression explicite du client3, donc appel du destructeur
unset($client3);
//Fin du script
echo "Fin du script";




//Notez l’ordre d’apparition de la boite d’alerte créée par le destructeur après l’appel de la fonction unset() et de l’affichage de la fin du script.
?>