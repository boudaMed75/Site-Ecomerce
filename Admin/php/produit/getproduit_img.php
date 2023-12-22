<?php

    include_once "../config.php";
    $id = $_GET['id_produit'];

    
    
    $req = $con->prepare("
    SELECT p.title as title , m.id as id , m.src as src


    FROM produit p , produit_imgs m


    WHERE p.id =  m.id_produit AND m.id_produit = ? ;
        
    ");
    $req->bindValue(1,$id);
    $req -> execute();
    $res =$req-> fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($res);
?>