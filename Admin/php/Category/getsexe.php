<?php

    include_once "../config.php";
    if(isset($_GET['sexe'])){
        $req = $con->prepare("SELECT * FROM category WHERE sexe = ?");
        $req->bindValue(1,$_GET['sexe']);
        $req -> execute();
        $res =$req-> fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($res);
    }
    else{
        $req = $con->prepare("SELECT DISTINCT sexe FROM category;");
        $req -> execute();
        $res =$req-> fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($res);

    }
    

?>
