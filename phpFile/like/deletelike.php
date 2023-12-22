<?php

        
    include_once "../config.php";

    $pro = $_GET['id_pro'];
    $id_user = $_GET['id_user'];

    
    $stmt = $con->prepare("DELETE FROM liked WHERE id_produit = ? AND id_user = ? ");
    $stmt->bindValue(1,$pro);
    $stmt->bindValue(2,$id_user);
    

    if($stmt->execute()){
        echo 1;
    }
    else{
        echo 0;
    }



?>