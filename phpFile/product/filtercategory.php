<?php

    include_once "../config.php";
    $sexe = $_GET['sexe'];
    $id = $_GET['id'];

    
    
    $req = $con->prepare("
    SELECT * FROM produit

    WHERE 

    id_sous_cat in (SELECT id FROM souscategory where id_cat = ? )
    
    AND 
    
    id_sous_cat in (SELECT id FROM souscategory where id_cat in (SELECT id FROM category where sexe = ?));
    
    
        
    ");
    $req->bindValue(1,$id);
    $req->bindValue(2,$sexe);
    $req -> execute();
    $res =$req-> fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($res);
?>