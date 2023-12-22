<?php

    include_once "../config.php";

    $color = $_POST['id_colors'];
    $size = $_POST['id_size'];
    $pro = $_POST['id_pro'];
    $user = $_POST['id_user'];
    $q = $_POST['q'];

    
    $date = date('Y-m-d H:i:s'); 
    $datetime = date('Y-m-d H:i:s', strtotime($date)); 
    $stmt = $con->prepare("INSERT INTO comnade (status,passedAt,id_user,id_produit,id_size,id_colors,quantite,ispayed,isdelevred) VALUES (?,?,?,?,?,?,?,?,?)");

    $stmt->bindValue(1,"panier");
    $stmt->bindValue(2,$datetime);
    $stmt->bindValue(3,$user);
    $stmt->bindValue(4,$pro);
    $stmt->bindValue(5,$size);
    $stmt->bindValue(6,$color);
    $stmt->bindValue(7,$q);
    $stmt->bindValue(8,false);
    $stmt->bindValue(9,false);
    

    if($stmt->execute()){
        echo "ok";
    }
    else{
        echo "something wong wrong";
    }

   

    
    
    


?>