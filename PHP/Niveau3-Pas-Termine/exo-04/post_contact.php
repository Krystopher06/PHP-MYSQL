<?php
    if($_POST){
        $name = $_POST['user_name'];
        $mail = $_POST['user_mail'];
        $phone = $_POST['user_phone'];
        $address = $_POST['user_address'];
        $postal = $_POST['user_postalCode'];
       
        if(!empty($name)){
            echo $name."<br>";
        }else{
            echo "Champ invalide <br>";
            /* echo "<button href='index.php'>Revenir sur le formulaire </button>"; */
        }
        if(!empty($mail) && preg_match("/@/",$mail)){
            echo $mail."<br>";
        }else{
            echo "Champ invalide <br>";
        }
        if(!empty($phone) && preg_match("/[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}/",$phone)){
            echo $phone."<br>";
        }else{
            echo "Champ invalide <br>";
        }
        if(!empty($address)){
            echo $address."<br>";
        }else{
            echo "Champ invalide <br>";
        }
        if(!empty($postal) && preg_match("/[0-9]{5}/",$postal)){
            echo $postal."<br>";
        }else{
            echo "Champ invalide <br> ";
        }
    }

    ?>
