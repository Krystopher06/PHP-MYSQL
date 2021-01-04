<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>SQL NV 2 Exercice 1</h1>


<hr>


<?php
    
    
/* verifier requete poste existante if isset ($_post)*/

    $name = $_POST['user_name'];
    $password = $_POST['user_password'];
    
    $nameValid = !empty($name);
    $passwordValid = !empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password);
    /* $phoneValid = !empty($phone) && preg_match("/[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}/", $phone);
    $adressValid = !empty($address);
    $postalCodeValid = !empty($postal) && preg_match("/[0-9]{5}/", $postal); */
    $result = true;
    

    if ($result == $nameValid && $result == $passwordValid) {
        
            $date = Date("Y-m-d H:i:s");
            $db = new mysqli("localhost","root","","niveau_2");
            $sql = "insert into Connexions(Pseudo, MotDePasse,DateLogin)
                    Values ('$name', '$password','$date')";
            $result = mysqli_query($db, $sql) or die("bad query");

    ?>
        <table>
            <tr>
                <td>Nom: </td>
                <td> <?php echo $name; ?></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><?php echo $password; ?></td>
            </tr>
        </table>

    <?php } else { ?>

        <?php
               /*  $name = $_POST['user_name'];
                $password = $_POST['user_password']; */
        ?>

        <form method="POST" action=" ">
            <div>
                <div>
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="user_name">
                </div>
                <?php
                if (!empty($name)) {
                    $nameResult = true;
                  /*   $date = Date("Y-m-d H:i:s"); */
                /*     $name . "<br>" */;
                } else {
                    echo "Champ invalide <br>";
                }
                /* echo "<button href='index.php'>Revenir sur le formulaire </button>"; */

                ?>
                <br>
                <div>

                    <label for="password"> Mot de passe:</label>
                    <input type="text" id="password" name="user_password">
                </div>
                <?php
                if (!empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password)) {
                    $mailResult = true;
                   /*  $date = Date("Y-m-d H:i:s"); */
                    

                    echo "<br>";
                } else {
                    $mailResult = false;
                    echo "Champ invalide <br>";
                }
                ?>
                <br>
                <br>
                <button type="submit" name="submit">Envoyer</button><br><br>
            </div>


        </form>


    <?php
    }
    ?>




</body>
</html>