<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Exercice 5</h1>

Enoncé :
Dans un fichier "index.php", créez un formulaire contenant une zone de saisie pour le nom, le revenu et un bouton OK pour soumettre le formulaire. <br><br>
Le but de ce formulaire est de permettre le calcul de l’impôt pour une personne. <br><br>
Le taux de l’impôt est de 15% pour des revenus inférieurs à 15 000 euros et de 20 % pour des revenus supérieurs à 15 000. <br><br>
Le formulaire enverra ses données avec la méthode GET et chargera le fichier resultatImpot.php lors de sa soumission. <br> <br>
Sa déclaration sera : < form action="resultatImpot.php" method="get" > <br><br>
Une fois le formulaire envoyé grâce au bouton OK, une phrase s’affiche du style « Monsieur Durant votre impôt est de 600 euros ». <br><br>
<br><br>
Le programme doit obligatoirement contenir 3 fichiers :<br><br>

Le fichier "impot.php" contiendra :<br>
* une classe "impot"<br>
* avec son constructeur, <br>
* une méthode afficheImpot() qui retourne une chaîne contenant le message à afficher (« Monsieur Durant votre impôt est de 600 euros » par exemple) <br>
* et une méthode calculeImpôt() qui retourne le montant de l’impôt suivant le revenu.<br>
* ainsi que deux constantes qui serviront à définir les taux d'imposition (20% et 15%)<br>
<br><br>
Le fichier "resultatImpot.php" contiedra : <br><br>
* la création de l’objet qui servira au calcul<br>
* et l’appel des méthodes nécessaires à ce calcul<br><br>

Enfin le fichier "index.php" qui sera le fichier chargé dans le navigateur et qui affichera le formulaire<br>
<br>
Etape 1.
Affichez la page index.php dans un navigateur.
Le formulaire doit s’afficher. Saisir le nom (Végéta) et le revenu (10000). Cliquer sur OK. 
La phrase "Monsieur Végéta votre impôt est de 1500 euros." doit être affichée. <br>

Etape 2.
Relancez la page index.php dans votre navigateur.
Le formulaire doit s’afficher. Saisir le nom (Végéta) et le revenu (20000). Cliquer sur OK. La phrase "Monsieur Végéta votre impôt est de 4000 euros." doit être affichée.<br>

Etape 3.
Regardez le code dans le fichier impot.php. Vériifez bien que La classe "impot" est définie avec un constructeur et deux méthodes. La méthode AfficherImpot() fait appel à la méthode CalculImpot(). Les pourcentage de taxe sont définis avec le mot-clé "const".<br>

Etape 4.
Regardez le code dans le fichier resultatImpot.php. Vous devez y retrouver l'instanciation de la classe "impot" grâce au mot clé "new". Les informations retournées par la fonction AfficherImpot() sont utilisées pour afficher les impôts de l'utilisateur.<br>



<br>

<hr>
<h2>Application</h2>





<form action="resultatImpot.php" method="get"> <!-- method="post" -->

<fieldset>
		<legend><span>Calcule d'impôt</span></legend>
		<span>Votre nom :  </span><input type="text" name="nom" /><br /><br />
		<span>Votre revenu : </span><input type="text" name="revenu" /><br /><br />
		<input type="submit" name="envoi" value="Envoyer"/><br />
</fieldset>


 






















</body>
</html>