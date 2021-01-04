<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>SQL NV 2 Exercice 2</h1>


    <hr>


    <?php
    function str_random($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
       return str_shuffle(str_repeat($alphabet,$length));
    }

    if (isset($_POST["submit"])) {

        $lastName = $_POST['user_lastName'];
        $firstName = $_POST['user_firstName'];
        $mail = $_POST['user_mail'];
        $password = $_POST['user_password'];
        $password_confirm = $_POST['user_password_confirm'];
        $info =  $_POST['user_info'];
        $condition = isset($_POST['user_condition']);

        $pdoConnect = new PDO("mysql:host=localhost;dbname=niveau_2", "root", "");
        $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $lastNameValid = isset($lastName) && !empty($lastName);
        $firstNameValid = isset($firstName) && !empty($firstName);
        $mailValid = isset($mail) && !empty($mail) && preg_match("/@/", $mail) && (preg_match("/.com/", $mail) ||  preg_match("/.fr/", $mail));
        $passwordValid_1 = isset($password) && !empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password);
        $passwordValid_2 = isset($password_confirm) && !empty($password_confirm) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password_confirm);
        $passwordValid_3 = $password == $password_confirm;
        $infoValid = isset($info) && !empty($info);
        $conditionValid = isset($condition) && !empty($condition);
        $result = true;
    }




    /* $lastNameValid = isset($lastName) && !empty($lastName);
    $firstNameValid = isset($firstName) && !empty($firstName);
    $mailValid = isset($mail) && !empty($mail) && preg_match("/@/", $mail) && (preg_match("/.com/", $mail) ||  preg_match("/.fr/", $mail));
    $passwordValid_1 = isset($password) && !empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password);
    $passwordValid_2 = isset($password_confirm) && !empty($password_confirm) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password_confirm);
    $passwordValid_3 = $password == $password_confirm;
    $infoValid = isset($info) && !empty($info);
    $conditionValid = isset($condition) && !empty($condition);
    $result = true; */
    $options = ['cost' => 12,];
    $error = 0;
    /* var_dump($passwordValid_1); */




    /* if (
       
    ) { */




    /* $db = new mysqli("localhost", "root", "", "niveau_2");
       
                    
        $result = mysqli_query($db, $sql);
        echo $sql; */
    /*  try {


            $sql = "insert into utilisateurs(Nom, Prenom, Email, MotDePasse,Info)
            Values ('$lastName','$firstName' , '$mail','$cryptPassword','$info')";
            $pdoConnect->exec($sql);
            echo "Donnée envoyé";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $pdoConnect = null;
 */








    ?>
    <!-- <table>
            <tr>
                <td>Nom: </td>
                <td> <?php /* echo $lastName; */ ?></td>
            </tr>
            <tr>
                <td>Prenom: </td>
                <td><?php /* echo $firstName;  */ ?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td> <?php /* echo $mail; */ ?></td>
            </tr>
            <tr>
                <td>password: </td>
                <td> <?php /* echo sha1($password); */ ?></td>
            </tr>
            <tr>
                <td>Info: </td>
                <td> <?php /* echo $info; */ ?></td>
            </tr>
        </table> -->



    <?php /* } else { */ ?>


    <form method="POST" action=" ">
        <div>
            <div>
                <label for="lastName">Nom:</label>
                <input type="text" id="lastName" name="user_lastName" value="<?php echo isset($_POST["user_lastName"]) ? $_POST["user_lastName"] : "" ?>">
            </div>
            <?php
            if (isset($_POST["submit"])) {

                if (empty($lastName)) {


                    echo "Champ invalide <br>";
                    var_dump($lastName);
                }
            }


            ?>
            <br>
            <div>
                <label for="firstName">Prénom:</label>
                <input type="text" id="firstName" name="user_firstName" value="<?php echo isset($_POST["user_firstName"]) ? $_POST["user_firstName"] : "" ?>">
            </div>
            <?php
            if (isset($_POST["submit"])) {
                if (empty($firstName)) {
                    echo "Champ invalide <br>";
                    var_dump($firstName);
                }
            }


            ?>
            <br>

            <div>

                <label for="mail">E-mail:</label>
                <input type="email" id="mail" name="user_mail" value="<?php echo isset($_POST["user_mail"]) ? $_POST["user_mail"] : "" ?>">
            </div>
            <?php









            if (isset($_POST["submit"])) {
                if (
                    !empty($mail) &&
                    preg_match("/@/", $mail) &&
                    preg_match("/.com/", $mail) ||
                    preg_match("/.fr/", $mail)
                ) {

                    echo "<br>";
                } else {

                    echo "Champ invalide <br>";
                }
            }








            ?>
            <br>

            <div>


                <label for="password1"> Mot de passe:</label>
                <input type="text" id="password1" name="user_password">
                <label for="password2"> <br> Retapez votre mot de passe: </label><br />
                <input type="text" name="user_password_confirm" id="password2" /><br />

            </div>
            <?php
            if (isset($_POST["submit"])) {
                if ($password == $password_confirm) {



                    if ((!empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password))) {
                        $cryptPassword = password_hash($password, PASSWORD_DEFAULT, $options);
                    } else {
                        echo "Champ invalide <br>";
                    }
                } else {
                    echo "Pas les mêmes mots de passes";
                }
            }

            ?>










            <br>
            <br>

            <!--  <div>
                    <label for="info">Info:</label>
                    <select id="info" name="user_info">
                        <option value=""></option>
                        <option value="particulier">Particulier</option>
                        <option value="professionnel">Professionnel</option>
                    </select>
                </div> -->

            <div>
                <input type="radio" id="infoParticulier" name="user_info" value="Particulier" <?php echo !isset($_POST["user_info"]) || $_POST["user_info"] == "Particulier" ? "checked" : "" ?>>
                <label for="info">Particulier</label>

            </div>
            <div>
                <input type="radio" id="infoProfessionnel" name="user_info" value="Professionnel" <?php echo isset($_POST["user_info"]) && $_POST["user_info"] == "Professionnel" ? "checked" : "" ?>>
                <label for="info">Professionnel</label>
            </div>

            <br>


            <?php

            if (empty($info)) {
                echo "Veuillez selectionner votre choix <br>";
            }
            ?>






            <br>

            <div>
                <input type="checkbox" id="scales" name="user_condition">
                <label for="scales"> « Je reconnais avoir pris connaissance des conditions d’utilisation et y adhère totalement
                    »</label>
            </div>
            <?php
            if (empty($condition)) {
                echo "Le champ n'est pas coché  <br>";
            }
            ?>

            <br>
            <br>
            <button type="submit" name="submit">Envoyer</button><br><br>
        </div>



    </form>


    <?php /* } */



    if (isset($_POST["submit"])) {
        if (
            $result == $lastNameValid &&
            $result == $firstNameValid &&
            $result == $mailValid &&
            $result == $passwordValid_1 &&
            $result == $passwordValid_2 &&
            $result == $passwordValid_3 = $password == $password_confirm &&
            $result == $infoValid &&
            $result == $conditionValid
        ) {





            try {

                
                /* var_dump($mailExist); */
                $query = "SELECT * FROM `utilisateurs` WHERE Email = '$mail' ";
                $data = $pdoConnect->query($query);
                $mailExist = $data->fetch();
                $date = Date("Y-m-d H:i:s");
                /* var_dump($mailExist); */

                if ($mailExist) {

                    echo "Ce mail existe déjà";
                } else {
                    try {

                        $cryptPassword = password_hash($password, PASSWORD_DEFAULT, $options);

                        $sql = "insert into utilisateurs(Nom, Prenom, Email, MotDePasse,Info,createdAt)
                        Values ('$lastName','$firstName' , '$mail','$cryptPassword','$info','$date')";

                        $pdoConnect->exec($sql);

                        echo "Donnée envoyé";
                    } catch (PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();
                    }
                    $pdoConnect = null;

                    echo "Ok";
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



    <!-- https://openclassrooms.com/forum/sujet/probleme-d-inscription-35385 -->
    <!-- https://stackoverflow.com/questions/42460896/check-username-and-email-already-exists-in-php-mysql -->
</body>

</html>