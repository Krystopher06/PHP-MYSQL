<?php require_once 'header.php';







// si il y a un code généré dans l'URL, alors le mail écris dans mdp oublié est = au code écris du token
//l'ID du mail écris dans mdp oublié est = a l'id écris sur l'URL (GET)
if (isset($_GET['section'])) {
    $section = htmlspecialchars($_GET['section']);
    $_SESSION["user_mailRecupeset"] = $_GET['section'];

    $_SESSION["ID"] = $_GET['ID'];

    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/newPassword.php');
}
// comparer le token de la db et le lien du mail
// true affiche le formulaire false "token expirer"
//

if (isset($_SESSION["user_mailRecupeset"]) && isset($_SESSION['ID'])) {
    $user =  $_SESSION["user_mailRecupeset"];
    $tokenExist = $database->get(
        'pwdreset',
        '*',
        ['pwdResetCode' => $user,]
        
    );
    if ($tokenExist) {


        if (isset($_POST["submit"])) {
            $password =  htmlspecialchars($_POST['user_password']);
            $password_confirm =  htmlspecialchars($_POST['user_password_confirm']);
            


            if ($password == $password_confirm) {
                if ((!empty($password) && preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password))) {
                    $options = ['cost' => 12,];
                    $cryptPassword = password_hash($password, PASSWORD_DEFAULT, $options);
                    $database->update(
                        "utilisateurs",
                        ["MotDePasse" => $cryptPassword]
                    );

                    $database->delete("pwdreset", [

                        "pwdResetCode" => $user
                    ]);


                    session_destroy();
                    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php');
                } else {
                    $error = "<p>Champ invalide</p> ";
                }
            } else {
                $notSamePassword =  "<p> Les 2 champs sont différents</p>";
            }
        }else{

        }
    }
} else {
    
    session_destroy();
    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/resetPasswordError.php');

}






?>

<body>
    
    <div>
        <form action="" method="post">
            <label for="password1"> Mot de passe:</label>
            <input type="text" id="password1" name="user_password"><span><?php if(isset($error)){
                echo $error;
            }  ?></span>
            <label for="password2"> <br> Retapez votre mot de passe: </label>
            <input type="text" name="user_password_confirm" id="password2" /> <span><?php if(isset($error)){
                echo $error;
            } ?></span>
            <br>
            <button type="submit" name="submit">Envoyer</button>
            <span><?php  if (isset($notSamePassword)){
                echo $notSamePassword;
            } ?></span>
        </form>
    </div> 
        
   
    

</body>
<?php require_once 'footer.php'; ?>