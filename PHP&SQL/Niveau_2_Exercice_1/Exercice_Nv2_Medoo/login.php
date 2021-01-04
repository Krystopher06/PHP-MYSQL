

 <?PHP 
 require_once 'header.php';

?>


<body>
<a href='http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php'>Revenir à la page d'accueil </a>    



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
        <a href="http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/resetPassword.php">Mot de passe oublié ?</a>
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


    /////////////



    if (isset($_POST["submit"])) {
        if (

            $result == $mailValid &&
            $result == $passwordValid
        ) {
            $date = Date("Y-m-d H:i:s");
            $dataUtilisateurs = $database->get(
                'utilisateurs',
                '*',
                ['Email' => $mail,]
                
            );



            if ($dataUtilisateurs) {
                $hash = $dataUtilisateurs['MotDePasse'];
                if (password_verify($password, $hash)) {
                    $_SESSION["user_mail"] = $mail;
                    $_SESSION["prenom"] = $dataUtilisateurs['Prenom'];
                    /* var_dump($_SESSION["prenom"]);
                    var_dump($_SESSION["user_mail"]); */
                    $database->insert('connexions', [
                        'Email' => $mail,
                        'Connection' => 0,
                        'DateLogin' => $date,
                    ]);

                    
                   header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php');
                 exit();
                    
                    
                } else {


                    $database->insert('connexions', [
                        'Email' => $mail,
                        'Connection' => 1,
                        'DateLogin' => $date,
                    ]);
                    echo "Password invalid";
                }
            } else {
                echo "L'email ou le mot de passe n'existe pas";
            }
        } else {
            echo " <p> Veuillez bien remplir les champs </p>";
        }
    }



    //////////////////////



    ?>




















</body>
<?php require_once 'footer.php';?>