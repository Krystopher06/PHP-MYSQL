<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Exercice 4</h1>

    <h2>Objectif: </h2>

    <h4>Traiter et valider les données envoyées via les formulaires</h4>

    <h3>Énoncé :</h3>

    <p>1) Créer dans une page HTML un formulaire de coordonnées personnelles
        composé des champs suivants :</p>

    <ul>
        <li>Nom complet du client</li>
        <li>Email</li>
        <li>Téléphone</li>
        <li>Adresse</li>
        <li>Code postal</li>
    </ul>

    <br>

    <p>2) Les données sont ensuite traitées par un fichier PHP séparé récupérant
        les données et les affichant dans un tableau HTML.</p>


    <p>3) Améliorer le script de traitement en vérifiant ce qui suit : <br>
        a) Tous les champs sont obligatoires <br>
        b) Le champs email doit contenir le caractère @. <br>
        c) Le champs téléphone doit être sous la forme (06 ou 05) 00 00 00 00. <br>
        d) Le code postal doit contenir 5 chiffres seulement. <br>
    </p>


    <p>4) Question bonus :
        Comment faire en sorte que les données soient traitées (en PHP) par le
        même fichier que celui qui contient le formulaire (la page HTML donc) ?
    </p>

    <hr>







    <?php
    
    $name = $_POST['user_name'];
    $mail = $_POST['user_mail'];
    $phone = $_POST['user_phone'];
    $address = $_POST['user_address'];
    $postal = $_POST['user_postalCode'];


    $result = true;
    $nameValid = !empty($name);
    $emailValid = !empty($mail) && preg_match("/@/", $mail);
    $phoneValid = !empty($phone) && preg_match("/[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}/", $phone);
    $adressValid = !empty($address);
    $postalCodeValid = !empty($postal) && preg_match("/[0-9]{5}/", $postal);

    if ($result == $nameValid && $result == $emailValid && $result == $phoneValid && $result == $adressValid && $result == $postalCodeValid) {


    ?>
        <table>

            <tr>
                <td>nom</td>
                <td> <?php echo $name; ?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?php echo $mail; ?></td>
            </tr>
            <tr>
                <td>tel</td>
                <td><?php echo $phone; ?> </td>
            </tr>
            <tr>
                <td>adresse</td>
                <td> <?php echo $address; ?></td>
            </tr>
            <tr>
                <td>Code Postal</td>
                <td> <?php echo $postal; ?></td>
            </tr>


        </table>
    <?php } else { ?>


        <form method="POST" action=" ">
            <div>
                <div>
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="user_name">
                </div>
                <?php
                if (!empty($name)) {
                    $nameResult = true;
                    $name . "<br>";
                } else {
                    echo "Champ invalide <br>";
                }
                /* echo "<button href='index.php'>Revenir sur le formulaire </button>"; */

                ?>
                <br>
                <div>

                    <label for="mail">E-mail:</label>
                    <input type="email" id="mail" name="user_mail">
                </div>
                <?php
                if (!empty($mail) && preg_match("/@/", $mail)) {
                    $mailResult = true;
                    echo "<br>";
                } else {
                    $mailResult = false;
                    echo "Champ invalide <br>";
                }
                ?>
                <br>
                <div>
                    <label for="phone">Téléphone:</label>
                    <input type="text" id="phone" name="user_phone">
                </div>
                <?php
                if (!empty($phone) && preg_match("/[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}/", $phone)) {
                    $phoneResult = true;
                    echo "<br>";
                } else {
                    $phoneResult = false;
                    echo "Champ invalide <br>";
                }

                ?>
                <br>
                <div>
                    <label for="address">Adresse:</label>
                    <input type="text" id="address" name="user_address">

                </div>
                <?php
                if (!empty($address)) {
                    $addressResult = true;
                    echo "<br>";
                } else {
                    $addressResult = false;
                    echo "Champ invalide <br>";
                }

                ?>
                <br>
                <div>
                    <label for="postalCode">Code Postal:</label>
                    <input type="text" id="postalCode" name="user_postalCode">
                </div>
                <?php

                if (!empty($postal) && preg_match("/[0-9]/", $postal)) {
                    $postalResult = true;
                    echo "<br>";
                } else {
                    echo "Champ invalide <br> ";
                }

                ?>
                <br>
                <button type="submit">Envoyer</button><br><br>
            </div>


        </form>


    <?php
    }
    ?>


































</body>

</html>