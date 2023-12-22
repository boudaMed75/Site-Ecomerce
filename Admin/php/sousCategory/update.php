<?php

    include_once "../config.php";


    $name = $_POST['name'];
    $des = $_POST['description'];

    $id = $_POST['id'];


    $stmt = $con->prepare("UPDATE souscategory SET 
            name = ? , description = ? 
            where id = ?
    ");
   
    $stmt->bindValue(1,$name);
    $stmt->bindValue(2,$des);
    $stmt->bindValue(3,$id);
    
    if($stmt->execute()){
        echo "OK";
    }
    else{
        echo "err lorsque de connexion avec server";
    }
    
    


?>