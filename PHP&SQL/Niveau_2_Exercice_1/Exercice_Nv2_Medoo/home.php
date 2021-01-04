<?php require_once 'header.php'; ?>






<?php

if (isset($_SESSION["prenom"])) {

?>
    <div>
        <div class="logbg bg-light"> </div>
        <div class="log  text-center"></div>
        <p class=""> <?php echo "Bienvenue " . (ucwords($_SESSION["prenom"])) ?> </p>

        <?php
        $mail = "";
        $dataUtilisateurs = $database->select(
            'utilisateurs',
            '*'
        );
        ?>

        <a href='http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/logout.php'>Logout </a>
    </div>


    <hr>
    <form action="update.php" method="POST">

        <button type="submit" name="add" class="btn btn-secondary disabled">Créer un nouvel utilisateur</button>
    </form>
    <button type="button" class="btn btn-outline-info">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"> Info </font>
        </font>
    </button>

    <div class="row">
        <div class="col-12">
            <table class=" table table-striped table-light">
                <thead>
                    <tr class="">
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th>Info</th>
                        <th>Date création</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($dataUtilisateurs as $row) { ?>
                        <tr class="">

                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['Nom']; ?></td>
                            <td><?php echo $row['Prenom']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td></td>
                            <td><?php echo $row['Info']; ?></td>
                            <td><?php echo $row['createdAt']; ?></td>

                            <td>
                                <form action="update.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['ID'] ?>" name='ID'>
                                    <button type="submit" name="update">Edit</button>
                                </form>
                            </td>
                            <td>

                                <a href="" onclick='deleteUser("<?php echo $row['ID'] ?>")'> Delete</a>

                            </td>

                            <!-- <td><a href="update.php?ID=<?php// echo $row['ID'] ?>">edit</a></td>    -->
                            <!--  <td><a href="delete.php?ID=<?php// echo $row['ID'] ?>">delete</a></td> -->
                            <!-- Faire si possible un bouton confirm en JS pour savoir si la personne est sur de suppr/edit la personne -->
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>


    <!-- <a href="update.php">Créer un nouvel utilisateur</a> -->

<?php
} else {
?>

    <div class="logbg bg-light">
        <div class="log  text-center">
            <p>Vous n'êtes pas connectée </p>
            <a href='http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/login.php'>Connectez-vous </a> <br>
            <a href='http://localhost/krys/PHP&SQL/Niveau_2_Exercice_1/Exercice_Nv2_Medoo/signin.php'>Inscrivez-vous </a><br>
        </div>
    </div>
<?php
}
?>






</body>
<script type="text/javascript">
    function deleteUser(ID) {
        if (window.confirm('Voulez-vous vraiment supprimer cet utilisateur ?')) {
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                data: 'ID=' + ID,
                dataType: 'html',
            });
            window.location.href = "home.php";
        }


    }
</script>
<?php require_once 'footer.php'; ?>