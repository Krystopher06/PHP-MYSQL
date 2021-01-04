<?php   require_once 'header.php'; ?>
<body>
<a href='http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php'>Revenir à la page d'accueil </a>    



    <hr>


    <?php



    function str_random($length)
    {
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return str_shuffle(str_repeat($alphabet, $length));
    }

    if (isset($_POST["submit"])) {



        $lastName = $_POST['user_lastName'];
        $firstName = $_POST['user_firstName'];
        $mail = $_POST['user_mail'];
        $password = $_POST['user_password'];
        $password_confirm = $_POST['user_password_confirm'];
        $info =  $_POST['user_info'];
        $condition = isset($_POST['user_condition']);


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

    $options = ['cost' => 12,];
    $error = 0;









    ?>

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


    <?php



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
            
                $data = $database->get(
                    'utilisateurs',
                    '*',
                    ['Email' => $mail,]
                );
                $date = Date("Y-m-d H:i:s");
                /* var_dump($mailExist); */

                if (!$data) {
                    $database->insert('utilisateurs', [
                        'Nom' => $lastName,
                        'Prenom' => $firstName,
                        'Email' => $mail,
                        'MotDePasse' => $cryptPassword,
                        'Info' => $info,
                        'createdAt' => $date,
                    ]);
                    echo "<script> alert('La création de votre compte à été effectué') </script>";
                    echo "<script> alert('Redirection sur la page d'acceuil') </script>";
                    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/signinDone.php');
                    exit();
                } else {
                    echo "<p>Ce mail existe déjà</p>";
                    echo "<a href='http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/login.php'>Connectez-vous </a>";
                }
                
            
        }
    }




    ?>



    <!-- https://openclassrooms.com/forum/sujet/probleme-d-inscription-35385 -->
    <!-- https://stackoverflow.com/questions/42460896/check-username-and-email-already-exists-in-php-mysql -->
</body>

<?php require_once 'footer.php';?>