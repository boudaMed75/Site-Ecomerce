<?php

        
    include_once "../config.php";

    $pro = $_GET['id_pro'];
    $id_user = $_GET['id_user'];

    // echo $pro . " " . $id_user;

   

    
    $req = $con->prepare("SELECT * FROM liked WHERE id_produit = ? AND id_user = ? ");
    $req->bindValue(1,$pro);
    $req->bindValue(2,$id_user);

    $req -> execute();
    $res = $req-> fetchAll(PDO::FETCH_ASSOC);
    
    if(count($res)===0){
        echo 0;
    }
    else{
        echo 1;
    }


?>