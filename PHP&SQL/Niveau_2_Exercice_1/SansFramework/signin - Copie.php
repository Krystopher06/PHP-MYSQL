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

    if (isset($_POST["submit"])) {

        $lastName = $_POST['user_lastName'];
        $firstName = $_POST['user_firstName'];
        $mail = $_POST['user_mail'];
        $password = $_POST['user_password'];
        $password_confirm = $_POST['user_password_confirm'];
        $info =  $_POST['user_info'];
        $condition = isset($_POST['user_condition']);
    }




    $lastNameValid = isset($lastName) && !empty($lastName);
    $firstNameValid = isset($firstName) && !empty($firstName);
    $mailValid = isset($mail) && !empty($mail) && preg_match("/@/", $mail) && (preg_match("/.com/", $mail) ||  preg_match("/.fr/", $mail));
    $passwordValid_1 = isset($password) && !empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password);
    $passwordValid_2 = isset($password_confirm) && !empty($password_confirm) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password_confirm);
    $infoValid = isset($info) && !empty($info);
    $conditionValid = isset($condition) && !empty($condition);
    $result = true;


    if (
        $result == $lastNameValid &&
        $result == $firstNameValid &&
        $result == $mailValid &&
        $result == $passwordValid_1 &&
        $result == $passwordValid_2 &&
        $result == $infoValid &&
        $result == $conditionValid
    ) {



        $db = new mysqli("localhost", "root", "", "niveau_2");
        $sql = "insert into utilisateurs(Nom, Prenom, Email, MotDePasse,Info)
                    Values ('$lastName','$firstName' , '$mail','$password','$info')";
        $result = mysqli_query($db, $sql);
        echo $sql;

    ?>
        <!-- <table>
            <tr>
                <td>Nom: </td>
                <td> <?php echo $lastName; ?></td>
            </tr>
            <tr>
                <td>Prenom: </td>
                <td><?php echo $firstName; ?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td> <?php echo $mail; ?></td>
            </tr>
            <tr>
                <td>password: </td>
                <td> <?php echo sha1($password); ?></td>
            </tr>
            <tr>
                <td>Info: </td>
                <td> <?php echo $info; ?></td>
            </tr>
        </table> -->

        <?php echo "c'est envoyé" ?>

    <?php } else { ?>


        <form method="POST" action=" ">
            <div>
                <div>
                    <label for="lastName">Nom:</label>
                    <input type="text" id="lastName" name="user_lastName">
                </div>
                <?php
                if (isset($_POST["submit"])) {
                    if (!empty($lastName)) {
                        $lastName = true;
                    } else {
                        echo "Champ invalide <br>";
                    }
                }


                ?>
                <br>
                <div>
                    <label for="firstName">Prénom:</label>
                    <input type="text" id="firstName" name="user_firstName">
                </div>
                <?php
                if (!empty($firstName)) {
                    $firstName = true;
                } else {
                    echo "Champ invalide <br>";
                }


                ?>
                <br>

                <div>

                    <label for="mail">E-mail:</label>
                    <input type="email" id="mail" name="user_mail">
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


                </div>
                <?php
                if ($password = $password_confirm) { 
                    


                    if ((!empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password))) {



                        echo "<br>";
                    } else {

                        echo "Champ invalide <br>";
                    }


                    ?>

                    <label for="password2"> <br> Retapez votre mot de passe: </label><br />
                    <input type="text" name="user_password_confirm" id="password2" /><br />

                    <?php
                    if ((!empty($password_confirm) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password_confirm))) {
                    } else {
                        echo "Champ invalide <br>";
                    }
                }else{
                    echo 'Pas le même MDP';
                }

                ?>










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
                    <input type="radio" id="infoParticulier" name="user_info" value="Particulier" checked>
                    <label for="info">Particulier</label>

                </div>
                <div>
                    <input type="radio" id="infoProfessionnel" name="user_info" value="Professionnel">
                    <label for="info">Professionnel</label>
                </div>


                <?php

                if (!empty($info)) {
                } else {
                    echo "Champ invalide <br>";
                }
                ?>

                <br>


                <div>
                    <input type="checkbox" id="scales" name="user_condition">
                    <label for="scales"> « Je reconnais avoir pris connaissance des conditions d’utilisation et y adhère totalement
                        »</label>
                </div>
                <?php
                if (!empty($condition)) {
                } else {
                    echo "Le champ n'est pas coché  <br>";
                }
                ?>

                <br>
                <br>
                <button type="submit" name="submit">Envoyer</button><br><br>
            </div>



        </form>


    <?php } ?>




</body>

</html>