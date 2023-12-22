<?php
    
    include_once "../config.php";

    if(isset($_GET['sexe'])){
        $req = $con->prepare("SELECT * FROM category where sexe = ? ");
        $req -> execute();
        $res =$req-> fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($res);
    }
    else{
        $req = $con->prepare("SELECT * FROM category");
        $req -> execute();
        $res =$req-> fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($res);
    }
    
   


?>
