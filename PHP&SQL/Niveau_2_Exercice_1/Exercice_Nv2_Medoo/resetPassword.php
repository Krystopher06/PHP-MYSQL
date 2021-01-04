<?php   require_once 'header.php'; ?>
<!-- https://www.developpez.net/forums/d1417886/php/langage/genere-url-unique/ -->

<body>
<a href='http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php'>Revenir à la page d'accueil </a>    

    <?php
    // On requiere Dbh pour pouvoir se servir de $database


    
   
    /* function generateRandomString1($length = 40) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    } */

    function generateRandomString($length = 60) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    

    function issetSubmit($var)
    {
        if (isset($_POST["submit"])) {
            return $var;
        }
    }
    /* verifier requete poste existante if isset ($_post)*/
    if (isset($_POST["submit"])) {


        $mailRecup = htmlspecialchars($_POST['user_mailRecupeset']);
        //$mailValidRecup = !empty($mailRecup) && (filter_var($mailRecup, FILTER_VALIDATE_EMAIL));
        $result = true;

        /* $user = $_SESSION['id']; */


        if (!empty($mailRecup) && (filter_var($mailRecup, FILTER_VALIDATE_EMAIL))) {

            $mailRecupSetError = null;
            $mailValidRecup = true;


            if ($result == isset($mailValidRecup)) {

                

                $dataUtilisateurs = $database->get(
                    'utilisateurs',
                    '*',
                    ['Email' => $mailRecup,]
                    
                );

                if ($dataUtilisateurs) {
                    /* $token1 = generateRandomString1().'<br>'; */
                        $recupCode = generateRandomString();
                        /* var_dump($recupCode);
                         */
                       
                    $_SESSION['user_mailRecupeset'] = $mailRecup;
                    $prenom = $dataUtilisateurs['Prenom'];
                    $id = $dataUtilisateurs['ID'];
    
                   ;
                    var_dump($prenom);
                    /* $recupCode = "";
                    for ($i = 0; $i < 20; $i++) {
                        $recupCode .= mt_rand(0, 21);
                        //.= Permet d'écrire à la suite
                    } */
                    $_session['recup_code'] = $recupCode;
                    //var_dump($recupCode);

                    $mailRecupExist = $database->get(
                        'pwdreset',
                        '*',
                        ['pwdResetEmail' => $mailRecup,]
                    );
                    echo "test 1 <br>";
                    echo "vardump ".var_dump($mailRecupExist);
                    echo "test 1 <br>";


                    if ($mailRecupExist) { // si le mail dans la table pwdreset existe pas




                        $mailRecupExist = $database->update(
                            'pwdreset',
                            ['pwdResetCode' => $recupCode],
                            ['pwdResetEmail' => $mailRecup]
                        );

                        echo 'Mail update';
                    } else {

                        echo 'Mail ecris dans la base de donnée <br>';



                        $database->insert('pwdreset', [
                            'pwdResetEmail' => $mailRecup,
                            'pwdResetCode' => $recupCode,
                        ]);


                        //https://youtu.be/wPSJ245H4OU?t=1276
                    }



                    // $reset_token = str_random(60);
                    // $tokenReset = $pdoConnect->prepare("UPDATE `utilisateurs` SET resetToken = '$reset_token', resetAt = NOW() WHERE id = ? ");
                    /* $pdoConnect->exec($tokenReset); */
                    $_SESSION["user_mailRecupeset"];
                    $subject = "Récup MDP";
                    $body = "<p>Bonjour <b>".$prenom."</b> </p>
                    <p>Veuillez cliquez ci-dessous afin de rénitialiser votre mot de passe</p>
                                    <a href= \"http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/newPassword.php?section=".$recupCode."&ID=".$ID."\" target=\"_blank\" > Cliquez ICI </a>";
                    include 'sendemail.php';

                    send_mail($mailRecup, $subject, $body);

                    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/exitResetPassword.php');
                    exit();
                    echo "Mail envoyé";
                } else {
                    var_dump($dataUtilisateurs);
                    $mailExistError = "Le mail existe pas";
                }
            };
        } else {
            
            $mailRecupSetError = "Le champ n'est pas respecté";
        }
    }
    /* $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "http://localhost/krys/PHP&SQL/Niveau_2_Exercice%201/newPassword.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1200; */




    ?>
    <!-- includes/reset-request.inc.php -->
    <form method="POST" action="">
        <div>
            <div>
                <label for="mailRecupeset">Veuillez saisir le mail </label>
                <br> <br>
                <input type="text" id="mailRecupeset" name="user_mailRecupeset" placeholder="Votre adresse Email">
                <span><?PHP if (isset($_POST["submit"])) {
                            echo $mailRecupSetError;
                        }  ?></span>

            </div>
            <br>
            <button type="submit" name="submit">Envoyer</button><br><br>
            <span><?PHP if (isset($mailExistError)) {
                        echo $mailExistError;
                    }  ?></span>
        </div>
    </form>

</body>

<?php   require_once 'footer.php'; ?>