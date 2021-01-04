<?php session_start(); ?>
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
    if (isset($_POST["submit"])) {
        $mail = $_POST['user_mail'];
        $password = $_POST['user_password'];
        $mailValid = !empty($mail) &&
            preg_match("/@/", $mail) &&
            (preg_match("/.com/", $mail) ||
                preg_match("/.fr/", $mail));
        $passwordValid = !empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password);
        $options = ['cost' => 12,];
        $result = true;
    }

    ?>


    <form method="POST" action=" ">
        <div>
            <div>
                <label for="mail">Email:</label>
                <input type="text" id="mail" name="user_mail">
            </div>
            <?php
            if (isset($_POST["submit"])) {
                if (
                    empty($mail) &&
                    !preg_match("/@/", $mail) &&
                    (!preg_match("/.com/", $mail) ||
                        !preg_match("/.fr/", $mail))
                ) {
                    echo "Champ invalide <br>";
                }
            }


            ?>
            <br>
            <div>

                <label for="password"> Mot de passe:</label>
                <input type="text" id="password" name="user_password">
            </div>
            <?php
            if (isset($_POST["submit"])) {

                if ((!empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password))) {
                    $cryptPassword = password_hash($password, PASSWORD_DEFAULT, $options);
                } else {
                    echo "Champ invalide <br>";
                }
            }
            ?>
            <br>
            <br>
            <button type="submit" name="submit">Envoyer</button><br><br>
            <a href="resetPassword.php">Mot de passe oublié ?</a>
        </div>
    </form>
    <?php


    /* if (isset($_POST["submit"])) {
        if (
            $result == $mailValid &&
            $result == $passwordValid
        ) {



            #$cryptPassword = password_hash($password, PASSWORD_DEFAULT, $options);
            $date = Date("Y-m-d H:i:s");
            $db = new mysqli("localhost", "root", "", "niveau_2");
            $sql = "insert into Connexions(Email, MotDePasse,DateLogin)
                            Values ('$mail', '$password','$date')";
            $result = mysqli_query($db, $sql) or die("bad query");
        } else {
            echo "Veuillez bien renseigner les champs";
        }
    } */




    if (isset($_POST["submit"])) {
        if (

            $result == $mailValid &&
            $result == $passwordValid
        ) {





            try {

                $pdoConnect = new PDO("mysql:host=localhost;dbname=niveau_2", "root", "");
                $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                /* var_dump($mailExist); */
                $query = "SELECT * FROM `utilisateurs` WHERE Email = '$mail' ";
                $data = $pdoConnect->query($query);
                $mailExist = $data->fetch();
                /* $db = new mysqli("localhost", "root", "", "niveau_2"); */

                /* var_dump($mailExist); */

                if ($mailExist) {
                    $hash = $mailExist['MotDePasse'];
                    if (password_verify($password, $hash)) {
                        //insert 1

                        try {


                            $date = Date("Y-m-d H:i:s");
                            $sql = "insert into Connexions(Email, Connection, DateLogin)
                            Values ('$mail', 1, '$date')";
                            $pdoConnect->exec($sql);






                            $_SESSION["user_mail"] = $mail;
                            header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice%201/home.php');
                        } catch (PDOException $e) {
                            echo $sql . "<br>" . $e->getMessage();
                        }
                    } else {

                        /*  // insert 0 dans la DB et si il a 5 fois 0 consécutive, il est bloqué
                        // Si il y a une bonne réponse après 4 essaie par exemple, les essaies seront reset */





                        // On récupére les données de connexion dans la table Connexions
                        $connectionDatasQuery = "SELECT * FROM `connexions` WHERE Email = '$mail'";
                        $failCountQuery = "SELECT countConnectionFailed FROM `connexions` WHERE Email = '$mail' ";
                        $stmt = $pdoConnect->prepare($failCountQuery);
                        $stmt -> execute();
                        var_dump($stmt);
                        $failCount =$stmt->fetch();
                        var_dump($failCountQuery);
                        echo "<br> test 1 <br>";
                        $connectionDatas =  $pdoConnect->exec($failCountQuery) or die("bad query");
                        var_dump($connectionDatas);
                        echo "<br> test 2 <br>";

                        // Si $connectionDatas n'éxiste pas, c'est à dire si aucune ligne ne correspond à notre requête, tu la créer
                        if (empty($connectionDatas)) {
                            $date = Date("Y-m-d H:i:s");
                            $sql = "insert into Connexions(Email, Connection,  countConnectionFailed, DateLogin)
                                Values ('$mail', 0, 0, ".$mail.")";
                            /* $result = mysqli_query($db, $sql) or die("bad query"); */
                            $pdoConnect->exec($sql);
                            var_dump($result);



                            try {


                                $date = Date("Y-m-d H:i:s");
                                $sql = "insert into Connexions(Email, Connection, DateLogin)
                                Values ('$mail', 0,'$date')";
                                $pdoConnect->exec($sql);
                                var_dump($pdoConnect->exec($sql));
                            } catch (PDOException $e) {
                                echo $sql . "<br>" . $e->getMessage();
                            }
                        } else {
                            echo "prout";
                        }

                        // Requête pour récupérer le compteur d'échec

                        /* $failCount = mysqli_query($db, $failCountQuery) or die("bad query"); */
                        $failCount = $pdoConnect->exec($failCountQuery) or die;
                        var_dump($failCount);

                        // On incrémente $failCount
                        $failCount++;

                        // On update les données de connexions
                        var_dump($failCount);
                        var_dump($updateFailCountQuery);
                        $updateFailCountQuery = "UPDATE table SET countConnectionFailed = $failCount WHERE Email = ".$mail." ";

                        /* $result = mysqli_query($db, $updateFailCountQuery) or die("bad query"); */
                        $result = $pdoConnect ->exec($updateFailCountQuery) or die("bad query");
                        var_dump($result);

                        echo "Password invalid";
                    }
                } else {
                    echo "error 1";
                }
            } catch (PDOException $e) {
                echo "error 2";
                $e->getMessage();
            }
        } else {
            echo " <p> Veuillez bien remplir les champs </p>";
        }
    }










    ?>




















</body>

</html>