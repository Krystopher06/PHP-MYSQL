<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Exercice 4</h1>
    <p>Enoncé :

Créez une classe nommée form représentant un formulaire HTML. 
Le constructeur doit créer le code d’en-tête du formulaire en utilisant les éléments < form > et < fieldset >. 
Une méthode settext() doit permettre d’ajouter une zone de texte. 
Une méthode setsubmit() doit permettre d’ajouter un bouton d’envoi. 
Les paramètres de ces méthodes doivent correspondre aux attributs des éléments HTML correspondants. 
La méthode getform() doit retourner tout le code HTML de création du formulaire. 
Créez des objets form, et ajoutez-y deux zones de texte et un bouton d’envoi. Testez l’affichage obtenu. 
Le fichier contenant la définition de la classe form (dont le squelette vous est fourni ci-dessous) est indépendant du fichier qui permettra de le tester. Il faudra donc inclure (include) ce fichier dans le fichier PHP destiné à utiliser cette classe.
Le code du fichier de test vous est fourni ci-dessous, vous ajusterez le nom du fichier php à inclure en fonction du nom que vous avez donné au vôtre.</p>

    <h2>Application</h2>
    <br>
    <hr>
    


Fichier de test incluant le fichier précédent et qui creé un objet de type form.
<?php
include('class_form.php');
//***************************
$myform = new form("traitement.php","Accès au site","post");
$myform->settext("nom","Votre nom :  ");
$myform->settext("code","Votre code : ");
$myform->setsubmit();
$myform->getform();
?>

<!-- A vous de compléter les méthodes de la classe form afin d'obtenir le résultat suivant lors de l'appel à $myform->getform() dans l'exemple ci-dessus : -->

<!-- <form action="traitement.php" method="post">
	<fieldset>
		<legend><span>Accès au site</span></legend>
		<span>Votre nom :  </span><input type="text" name="nom" /><br /><br />
		<span>Votre code : </span><input type="text" name="code" /><br /><br />
		<input type="submit" name="envoi" value="Envoyer"/><br />
	</fieldset>
</form> -->


   
</body>
</html>