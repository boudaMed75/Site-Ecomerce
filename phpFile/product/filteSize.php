<?php

    include_once "../config.php";
    $sexe = $_GET['sexe'];
    $size = $_GET['size'];

    
    
    $req = $con->prepare("
        SELECT * FROM produit WHERE id 


        in (SELECT id_produit FROM produit_size WHERE id_size = ? )
        AND 
        
        id_sous_cat in (SELECT id FROM souscategory where id_cat in (SELECT id FROM category where sexe = ?));
        
    
        
    ");
    $req->bindValue(1,$size);
    $req->bindValue(2,$sexe);
    $req -> execute();
    $res = $req-> fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($res);
?>