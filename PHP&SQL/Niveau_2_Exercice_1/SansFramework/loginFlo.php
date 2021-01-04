<?php session_start();
function db(){
    $pdoConnect = new PDO("mysql:host=localhost;dbname=niveau_2", "root", "");
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdoConnect;
} 
function selectDb($query)
{
   
    $data = db() ->query($query);
    return $data->fetch(); //retourne les resultats de la requete

}
function manageDb($query){
    $pdo = db()->exec($query); 
}

function getUser($mail)
{
    $query = "SELECT * FROM `utilisateurs` WHERE Email = '$mail' ";

    $user = selectDb($query); // elle execute la variable $query


    if (!empty($user)) {
        return $user;
    } else {
        return " Erreur $user ";
    }
};

//récupère les données de connexion en fonctions du $mail

function getConnexion($mail){
    $query = "SELECT * FROM `connexions` WHERE Email = '$mail' ";
    $connexion = selectDb($query);
    if (!empty($connexion)){
        return $connexion;
    }else{
        return false;
    } 
}



/* function tryUser($mail)
{
   //nombre d'essaied de l'utilisateur
    
} */




?>
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
    </form>
    <?php
    if (isset($_POST["submit"])) {
        if (

            $result == $mailValid &&
            $result == $passwordValid
        ) {





            try {

                // on récupère l'utilisateur
                $user = getUser($_POST['user_mail']);
                //Si l'utilisateur existe, on verifie le mdp et on insert les données de connections
                if ($user != false) {
                    
                    $hash = $user['MotDePasse'];
                    if (password_verify($password, $hash)) {
                       

                        try {
                            
                            
                            $date = Date("Y-m-d H:i:s");
                            $sql = "insert into Connexions(Email, Connection, DateLogin)
                            Values ('$mail', 0, '$date')";
                           
                            manageDb($sql);



                            /* oui c'est ici qu'on check si il existe mais il faut checké aussi si le gars est pas bloqué par rapport au 5try non ? */


                            $_SESSION["user_mail"] = $mail;
                            header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice%201/home.php');
                        } catch (PDOException $e) {
                            echo $sql . "<br>" . $e->getMessage();
                        }
                       
                    } else { 


                     
                        




                        // On récupére les données de connexion dans la table Connexions
                        $connectionDatasQuery = "SELECT * FROM `connexions` WHERE Email = '$mail'";
                    
                        $connectionDatas = getConnexion($mail)
                        ;
                        var_dump($connectionDatas);
                        

                        echo "<br> test 1 <br>";

                        // Si $connectionDatas n'éxiste pas, c'est à dire si aucune ligne ne correspond à notre requête, tu la créer
                        var_dump($connectionDatas);
                        if ($connectionDatas == false) {
                            var_dump("ok");
                            try {


                                $date = Date("Y-m-d H:i:s");
                                $sql = "insert into Connexions(Email, Connection,  countConnectionFailed, DateLogin)
                                Values ('$mail', 0, 1,'$date')";
                                

                                manageDb($sql);

                            } catch (PDOException $e) {
                                echo $sql . "<br>" . "error";
                                $e->getMessage();
                            }
                        } else {
                            

                            // nombre actuelle d'echec
                            $failCount = (int)$connectionDatas['countConnectionFailed'];
                            // On incrémente $failCount
                            //fail de +
                            $failCount++;
                            echo $failCount;

                            // On update les données de connexions

                            $updateFailCountQuery = "UPDATE connexions SET countConnectionFailed = $failCount WHERE Email = '$mail' ";
                            manageDb($updateFailCountQuery);
                            $result = $pdoConnect->exec($updateFailCountQuery) or die("bad query");
                        }
                        echo "Password invalid";
                    }
                } else {
                    echo "Erreur de login";
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