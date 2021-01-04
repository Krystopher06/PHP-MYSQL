<?php //Formulaire 
require_once 'dbMedoo.php';


if (isset($_POST['ID'])) {
    $id = $_POST['ID'];

    $user = $database->get(
        "utilisateurs",
        "*",
        ["ID" => $id]
        //["Nom","Prenom","Email","Info",]
    );
    /* var_dump($user['Nom']);
    var_dump($user['Prenom']); */

    $nom = $user['Nom'];
    $prenom = $user['Prenom'];
    $email = $user['Email'];
    $info = $user['Info'];
}
$infoPro = "";

if (isset($info) && $info == "Professionnel") {
    $infoPro = "checked='checked'";
} else if (isset($_POST["user_info"]) && $_POST['user_info'] == "Professionnel") {
    $infoPro = "checked='checked'";
}
$infoPart = "";
if (isset($info) && $info == "Particulier") {
    $infoPart = "checked='checked'";
} else if (!isset($_POST["user_info"]) || $_POST['user_info'] == "Particulier") {
    $infoPart = "checked='checked'";
}

if (isset($_POST['submit'])) {
    $lastName =  htmlspecialchars($_POST['user_lastName']);
    $firstName = htmlspecialchars($_POST['user_firstName']);
    $mail = htmlspecialchars($_POST['user_mail']);
    $password = htmlspecialchars($_POST['user_password']);
    $passwordConfirm = htmlspecialchars($_POST['user_password_confirm']);
    $userInfo = htmlspecialchars($_POST['user_info']);
    $result = true;
    $lastNameValid = true;
    $firstNameValid = true;
    $mailValid = true;
    $passwordValid = true;
    $userInfoValid = true;
    $options = ['cost' => 12,];


    if (empty($lastName)) {
        $errorLastName = "Champ invalide";
        $lastNameValid = false;
    }
    if (empty($firstName)) {
        $errorFirstName = "Champ invalide";
        $firstNameValid = false;
    }
    if (!empty($mail) && (filter_var($mail, FILTER_VALIDATE_EMAIL))) {

        if ($mail !== isset($email)) {
            $mailExist = $database->get(
                'utilisateurs',
                '*',
                ['Email' => $mail,]

            );
            if ($mailExist) {

                $mailvalid = false;
                $errorMail = "Ce mail existe déjà";
            }
        }


        if ($password == $passwordConfirm) {
            if (!empty($password)) {
                if (preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password)) {
                    $cryptPassword = password_hash($password, PASSWORD_DEFAULT, $options);
                } else {
                    $errorPassword = "Champ Incorect";
                    $passwordValid = false;
                }
            }
        } else {
            $errorPassword = "Les mots de passes ne sont pas identique";
            $passwordValid = false;
        }

        // krystopher.logez@hotmail.fr = $valeurGet = $post
        // si l'email du post est = a l'email du Get {on valid}sinon{on vérifie si le mail existe déjà dans la base de donnée SI il existe pas, on Update sinon {EmailValid = false}}
    } else {
        $errorMail = "Champ incorect";
        $mailvalid = false;
    }
}
/* if(isset())
    if($result == $mailValid && $result == $lastNameValid && $result == $firstNameValid) */
if (isset($_POST["submit"])) {
    if (
        $result == $lastNameValid &&
        $result == $firstNameValid &&
        $result == $mailValid &&
        $result == $passwordValid

    ) {
        $date = Date("Y-m-d H:i:s");
        $data = ["Nom" => $lastName, "Prenom" => $firstName, "Email" => $mail, "Info" => $userInfo];
        if (!empty($password)) {
            $data["MotDePasse"] = $cryptPassword;
        }





        if (isset($_POST["ID"])){
        $database->update("utilisateurs", $data, ["ID" => $id]);
        //debug()->
        }else{
            $database->insert('utilisateurs', [
                'Nom' => $lastName,
                'Prenom' => $firstName,
                'Email' => $mail,
                'MotDePasse' => $cryptPassword,
                'Info' => $userInfo,
                'createdAt' => $date,
            ]);
        }

        
    } else {
        $error = " Le formulaire n'est pas bien remplis";
    }
}


?>

<body>
    <!-- action="update.php?ID=<?//php echo $row['ID']; ?> -->
<a href="http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php">Revenir sur la page d'acceuil</a>
    <form method="post">
        <?php if(isset($_POST["ID"])):?>
        <input type="hidden" value="<?php  echo $id; ?>" name='ID'>
        <?php endif ?>



        <div>
            <div>
                <label for="lastName">Nom:</label>
                <input type="text" id="lastName" name="user_lastName" value="<?php if (isset($_POST["user_lastName"])) {
                                                                                    echo $_POST["user_lastName"];
                                                                                } else if (isset($nom)) {
                                                                                    echo $nom;
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>">
                <span><?php if (isset($errorLastName)) {
                            echo $errorLastName;
                        } ?></span>
                <!--       echo isset($_POST["user_lastName"]) ? $_POST["user_lastName"] : $nom  -->
                <?php /*  */ ?>
            </div>
            <br>
            <div>
                <label for="firstName">Prénom:</label>
                <input type="text" id="firstName" name="user_firstName" value="<?php if (isset($_POST["user_firstName"])) {
                                                                                    echo $_POST["user_firstName"];
                                                                                } else if (isset($prenom)) {
                                                                                    echo $prenom;
                                                                                } else {
                                                                                    echo "";
                                                                                } ?>">
                <span><?php if (isset($errorFirstName)) {
                            echo $errorFirstName;
                        } ?></span>
            </div>
            <br>
            <div>

                <label for="mail">E-mail:</label>
                <input type="email" id="mail" name="user_mail" value="<?php if (isset($_POST["user_mail"])) {
                                                                            echo $_POST["user_mail"];
                                                                        } else if (isset($email)) {
                                                                            echo $email;
                                                                        } else {
                                                                            echo "";
                                                                        } ?>">
                <span><?php if (isset($errorMail)) {
                            echo $errorMail;
                        } ?></span>
            </div><br>
            <div>


                <label for="password1"> Mot de passe:</label>
                <input type="text" id="password1" name="user_password"><span><?php if (isset($errorPassword)) {
                                                                                    echo $errorPassword;
                                                                                } ?></span>
                <label for="password2"> <br> Retapez votre mot de passe: </label>
                <br />
                <input type="text" name="user_password_confirm" id="password2" /><span><?php if (isset($errorPassword)) {
                                                                                            echo $errorPassword;
                                                                                        } else {
                                                                                            "";
                                                                                        } ?></span>
                <br />

            </div><br>
            <div>
                <input type="radio" id="infoParticulier" name="user_info" value="Particulier" <?php if (isset($infoPart)) {
                                                                                                    echo $infoPart;
                                                                                                }  ?>>


                <label for="info">Particulier</label>

            </div><br>
            <div>
                <input type="radio" id="infoProfessionnel" name="user_info" value="Professionnel" <?php if (isset($infoPro)) {
                                                                                                        echo $infoPro;
                                                                                                    }   /* <?=$infoPro => echo $infoPro */ ?>>

                <label for="info">Professionnel</label>
            </div><br>
            <?php //  Particulier       echo !isset($_POST["user_info"]) || $_POST["user_info"] == "Particulier" ? "checked" : "" 
            ?>
            <?php //  echo isset($_POST["user_info"]) && $_POST["user_info"] == "Professionnel" ? "checked" : "" 
            ?>

            <span><?php if (isset($error)) {
                        echo $error;
                    } ?>
            </span><br>

            <?php if (isset($_POST["ID"])):?>
                <button type="submit" name="submit" value='update'>Modifier</button><br><br>
            <?php else : ?>
                <button type="submit" name="submit" value='add'>Envoyer</button><br><br>
            <?php endif; ?>
        </div>
        <?php   ?>



    </form>
</body>