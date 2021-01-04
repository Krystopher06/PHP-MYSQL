<!-- Préambule :
Afin de vous familiariser avec la Programmation Orientée Objets (POO) commencez à consulter un cours ou un tuto vous expliquant bien les principes de ce paradigme de programmation. Vous pouvez consulter celui de Pierre Giraud, très complet : https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/introduction-programmation-orientee-objet/


Enoncé :

Écrivez une classe représentant une ville. Elle doit avoir les propriétés "nom" et "departement" et une méthode affichant «la ville X est dans le département : Y». 
Créez ensuite des objets Ville, affectez leurs propriétés, et utilisez la méthode d’affichage.

Vous pouvez vous inspirer du squelette suivant et le compléter : -->

<?php
/* class ville
{
	public $nom;
	public $departement;

	public function getinfo()
	{
		return ....... ; // réfléchir à ce que cette méthode doit renvoyer
	}
}

//Création d'objets

// on créé une première ville
$ville1 = new ville(); // on appelle le constructeur de classe
$ville1->nom="Nantes"; // on lui donne son nom
$ville1->departement=...;

$ville2 = ...
$ville2->...= ...
$ville2->...= ...
echo $ville1->getinfo();
echo $ville2->getinfo(); */
?>



<!-- Le résultat affiché attendu est :
La ville de Nantes est dans le département : Loire Atlantique
La ville de Lyon est dans le département : Rhône -->






<h2>Application</h2>


<?php 

/* Enoncé :

Écrivez une classe représentant une ville. Elle doit avoir les propriétés "nom" et "departement" et une méthode affichant «la ville X est dans le département : Y». 
Créez ensuite des objets Ville, affectez leurs propriétés, et utilisez la méthode d’affichage.

Vous pouvez vous inspirer du squelette suivant et le compléter : --> */
        
    class Ville
    {
        //public = la visibilité
        public $nom;                    
        public $departement;

        public function getInfo()
        {
            $grp = "La ville de $this->nom est dans le département: $this->departement <br /> ";
            return $grp; // réfléchir à ce que cette méthode doit renvoyer
            
        }
    }
    $ville1 = new Ville();
    $ville1->nom ="Grasse";
    $ville1->departement = "Alpes-Martimes";
    
    $ville2 = new Ville();
    $ville2->nom ="Toulon";
    $ville2->departement ="Var";

    $ville3=new Ville();
    $ville3->nom="Lyon";
    $ville3->departement="Rhône";
    
    
    echo $ville1->getInfo();
    echo $ville2->getInfo();
    echo $ville3->getInfo();
    
//Instanciation de la classe Ville
// $nom est une instance de classe (ou objet)

    
?>