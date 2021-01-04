
<?php   session_start(); ?>

<body><?php 
/* var_dump($_SESSION["user_mailRecupeset"]); */

if(isset($_SESSION["user_mailRecupeset"])){

    echo"
    <script>
        alert(\" Vous avez reçu le mail de modif à l'adresse ".($_SESSION["user_mailRecupeset"])." \")
    </script>";
    echo "<a href='http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php'>Revenir à l'écran d'accueil</a>";

    //header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/login.php');
    //session_destroy(); // Peut être a supprimer par rapport à la rénitialisation de MDP
   
}else{
    header('Location: http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/home.php');
    session_destroy();
    exit(); 
} 


?>
    


</body>

<?php   require_once 'footer.php'; ?>