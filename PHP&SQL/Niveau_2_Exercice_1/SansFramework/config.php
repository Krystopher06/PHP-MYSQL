<?php 

    session_start();
    $pdoConnect = new PDO("mysql:host=localhost;dbname=niveau_2", "root", "");
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
?>
    
</body>
</html>