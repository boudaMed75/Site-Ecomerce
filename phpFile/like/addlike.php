<?php

        
    include_once "../config.php";

    $pro = $_GET['id_pro'];
    $id_user = $_GET['id_user'];

    $date = date('Y-m-d H:i:s'); 
    $datetime = date('Y-m-d H:i:s', strtotime($date)); 
    $stmt = $con->prepare("INSERT INTO liked (liked_at,id_user,id_produit) VALUES (?,?,?)");
    $stmt->bindValue(1,$datetime);
    $stmt->bindValue(2,$id_user);
    $stmt->bindValue(3,$pro);
    

    if($stmt->execute()){
        echo 1;
    }
    else{
        echo 0;
    }



?>