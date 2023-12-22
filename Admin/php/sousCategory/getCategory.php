<?php

    include_once "../config.php";
    if(isset($_GET["id_cat"])){
        $req = $con->prepare("SELECT * FROM souscategory WHERE id_cat = ?");
        
        $req->bindValue(1,$_GET['id_cat']);
        $req -> execute();
        $res =$req-> fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($res);
    }
    else if (isset($_GET['sexe'])){
        $req = $con->prepare("SELECT * FROM souscategory WHERE id_cat 
            in (SELECT id FROM category where sexe = ?)
        ");
        
        $req->bindValue(1,$_GET['sexe']);
        $req -> execute();
        $res =$req-> fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($res);
    }
    else{
        $req = $con->prepare("SELECT * FROM souscategory");
        
        $res =$req-> fetchAll(PDO::FETCH_ASSOC);
        $req -> execute();
        
        echo json_encode($res);
    }
    


?>