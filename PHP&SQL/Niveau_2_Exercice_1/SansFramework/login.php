<?php  session_start();?>
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
        </div>
        <a href="resetPassword.php">Mot de passe oublié ?</a>
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
                $db = new mysqli("localhost", "root", "", "niveau_2");
                
                /* var_dump($mailExist); */

                if ($mailExist) {
                    $hash = $mailExist['MotDePasse'];
                    if (password_verify($password, $hash)) {
                        //insert 0
                        $date = Date("Y-m-d H:i:s");
                        $sql = "insert into Connexions(Email, Connection, DateLogin)
                            Values ('$mail', 0,'$date')";
                        $result = mysqli_query($db, $sql) or die("bad query");



                       
                        $_SESSION["user_mail"] = $mail;


                        header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice%201/home.php');
                        exit();
                    } else {
                        
                        // insert 1 dans la DB et si il a 5 fois 1 consécutive, il est bloqué
                        // Si il y a une bonne réponse après 4 essaie par exemple, les essaies seront reset

                        

                         
                        /* $failCount = "SELECT CountConnectionFailed FROM `utilisateurs` ";
                        $failCount++; */
                       
                        $date = Date("Y-m-d H:i:s");
                        $sql = "insert into Connexions(Email, Connection,  DateLogin)
                            Values ('$mail', 1, '$date')";
                        $result = mysqli_query($db, $sql) or die("bad query");
                        
                        /* $sql = "UPDATE table SET countConnectionFailed = $failCount WHERE Email = ".$mail." ";
                           
                        $result = mysqli_query($db, $sql) or die("bad query");  */
                        
                        echo "Password invalid";







                    }
                } else {
                    echo "error";
                }
            } catch (PDOException $e) {
                echo "error";
                $e->getMessage();
            }
        } else {
            echo " <p> Veuillez bien remplir les champs </p>";
        }
    }










    ?>




















</body>

</html>