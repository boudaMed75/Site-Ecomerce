
<?php
    $con = new PDO("mysql:server=localhost;dbname=ecomerce","root","");
    $con->query("SET NAMES 'utf8mb4'");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!$con){
        echo "DataBase Error !";
    }
?>
