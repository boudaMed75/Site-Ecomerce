<?php

    include_once "../config.php";


    $name = $_POST['name'];
    $sexe = $_POST['sexe'];
    $desc = $_POST['description'];
    $id = $_POST['id'];
    echo $name;



    $stmt = $con->prepare("UPDATE category SET 
            name = ? , description = ? ,sexe = ?
            where id = ?
    ");
   
    $stmt->bindValue(1,$name);
    $stmt->bindValue(2,$desc);
    $stmt->bindValue(3,$sexe);
    $stmt->bindValue(4,$id);
    
    if($stmt->execute()){
        echo "OK";
    }
    else{
        echo "err lorsque de connexion avec server";
    }
    
    


?>