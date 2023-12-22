<?php

    include_once "../config.php";
    // $sexe = $_GET['sexe'];

    
    
    $req = $con->prepare("
        SELECT * from produit 

    ");
    // $req->bindValue(1,$sexe);
    $req -> execute();
    $res =$req-> fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($res);
?>