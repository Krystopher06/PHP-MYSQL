<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- https://www.developpez.net/forums/d1417886/php/langage/genere-url-unique/ -->

<body>
    <?php
      // On requiere Dbh pour pouvoir se servir de $database
      require_once 'dbMedoo.php';

    require_once('config.php');
    function str_random($length)
    {
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return str_shuffle(str_repeat($alphabet, $length));
    }
    function generateRandomString1($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function generateRandomString2($length = 10) {
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


        $mailR = htmlspecialchars($_POST['user_mailReset']);
        //$mailValidR = !empty($mailR) && (filter_var($mailR, FILTER_VALIDATE_EMAIL));
        $result = true;

        /* $user = $_SESSION['id']; */


        if (!empty($mailR) && (filter_var($mailR, FILTER_VALIDATE_EMAIL))) {

            $mailResetError = null;
            $mailValidR = true;




            if ($result == isset($mailValidR)) {

                try {


                    

                   /*  $mailExist = $pdoConnect->prepare('SELECT * FROM `utilisateurs` WHERE Email = ? ');
                    $mailExist->execute(array($mailR));
                    $mailExist = $mailExist->rowCount(); */


                    $user = $database->get(
                        'utilisateurs',
                        '*',
                        ['pwdResetEmail' => $mailR,]
                    );


                    /* if ($mailExist == 1) {
                    } else {
                        $mailExistError = "Le mail n'existe pas";
                    } */

                    //$queryMail = "SELECT * FROM `utilisateurs` WHERE Email = '$mailR' /* AND confirmedAt IS NOT NULL */ /* confirmedAt si la personne a bien confirmer sont compte (pas encore fait) */  ";
                    /* $data = $pdoConnect->query($queryMail);
                    $mailExist = $data->fetch(); */




                    if ($user) {
                        $token1 = generateRandomString1().'<br>';
                        $token2 = generateRandomString2().'<br>';
                        var_dump($token1);
                        var_dump($token2);
                        $reset_token = str_random('');
                        var_dump($reset_token);
                        $_SESSION['user_mailReset'] = $mailR;
                        $recupCode = "";
                        for ($i = 0; $i < 20; $i++) {
                            $recupCode .= mt_rand(0, 21);
                            //.= Permet d'écrire à la suite
                        }
                        $_session['recup_code'] = $recupCode;
                        var_dump($recupCode);
                        /* $mailRExist = $pdoConnect->prepare('SELECT pwdResetId FROM `pwdreset` WHERE pwdResetEmail = ? '); */
                        /*  $mailRExist->execute([$mailR]); */
                        /* $mailRExistCount =  $mailRExist->rowCount();
                        var_dump($mailRExist); */
                        $mailRExist = $database->get(
                            'pwdreset',
                            '*',
                            ['pwdResetEmail' => $mailR,]
                        );
                        var_dump($mailRExist);
                       
                       
                        
                        
                        if ($mailRExist) {
                            echo "test 2";

                            /* $recupInsert = $pdoConnect->prepare('UPDATE `pwdreset` SET pwdResetCode = ? WHERE pwdResetEmail = ? '); */
                            //$recup_insert->execute([$recupCode, $mailR]);

                            $recupInsert =$database->update("pwdreset",["pwdResetCode"=> $recupCode],
                            ["pwdResetEmail"=> $mailR]);

                            echo 'test3'.var_dump( $recupInsert);
                            
                        } else {    echo "test 2 else";

                            /* $recupInsert = $pdoConnect->prepare('INSERT INTO `pwdreset`(pwdResetEmail, pwdResetCode) VALUES ( ? , ? )');
                            echo 'else test3'.var_dump( $recupInsert);
                            $recup_insert->execute([$mailR, $recupCode]); */

                            $recupInsert->insert('pwdreset', [
                                'pwdResetEmail' => $mailR,
                                'pwdResetCode' => $recupCode,
                            ]);


                            //https://youtu.be/wPSJ245H4OU?t=1276
                        }



                        $reset_token = str_random(60);
                        // $tokenReset = $pdoConnect->prepare("UPDATE `utilisateurs` SET resetToken = '$reset_token', resetAt = NOW() WHERE id = ? ");
                        /* $pdoConnect->exec($tokenReset); */
                        $subject = "Récup MDP";
                        $body = "<p>Veuillez cliquez ci-dessous afin de rénitialiser votre mot de passe</p>
                                    <a href= \"http://localhost/krys/PHP&SQL/Niveau_2_Exercice%201/newPassword.php\" target=\"_blank\" > Cliquez ICI </a>";
                        include 'sendemail.php';

                        send_mail($mailR, $subject, $body);

                        header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice%201/exitPasswordReset.php');
                        exit();
                        echo "Mail envoyé";
                    } else {
                        $mailExistError = "Le mail existe pas";
                    }
                } catch (PDOException $e) {
                    echo "error 1";
                    $e->getMessage();
                }
            };
        } else {

            $mailResetError = "Le champ n'est pas respecté";
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
                <label for="mailReset">Veuillez saisir le mail </label>
                <br> <br>
                <input type="text" id="mailReset" name="user_mailReset" placeholder="Votre adresse Email">
                <span><?PHP if (isset($_POST["submit"])) {
                            echo $mailResetError;
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

</html>