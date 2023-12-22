<?php

    include_once "../config.php";
    $sexe = $_GET['sexe'];
    $color = $_GET['color'];

    
    
    $req = $con->prepare("
    SELECT * FROM produit WHERE id 

    IN (SELECT id_produit FROM produit_color WHERE id_color = ?)
    
    AND 
    
    id_sous_cat in (SELECT id FROM souscategory where id_cat in (SELECT id FROM category where sexe = ?));
    
    
        
    ");
    $req->bindValue(1,$color);
    $req->bindValue(2,$sexe);
    $req -> execute();
    $res = $req-> fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($res);
?>