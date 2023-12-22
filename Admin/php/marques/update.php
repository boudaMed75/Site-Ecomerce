<?php

    include_once "../config.php";


    $name = $_POST['name'];
    $date = $_POST['date_start'];

    $id = $_POST['id'];


    $stmt = $con->prepare("UPDATE marque SET 
            name = ? , date_ajouter = ? 
            where id = ?
    ");
   
    $stmt->bindValue(1,$name);
    $stmt->bindValue(2,$date);
    $stmt->bindValue(3,$id);
    
    if($stmt->execute()){
        echo "OK";
    }
    else{
        echo "err lorsque de connexion avec server";
    }
    
    


?>