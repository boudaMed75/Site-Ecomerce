<?php

    include_once "../config.php";

    $pro = $_POST['id_pro'];
    $id_user = $_POST['id_user'];


    
    $req = $con->prepare("select * from liked where id_user = ? and id_produit = ?");
    $req->bindValue(1,$id_user);
    $req->bindValue(2,$pro);

    $req->execute();

    $names = $req->fetchAll(PDO::FETCH_COLUMN);
    if(count($names)===0){
        $date = date('Y-m-d H:i:s'); 
        $datetime = date('Y-m-d H:i:s', strtotime($date)); 
        $stmt = $con->prepare("INSERT INTO liked (liked_at,id_user,id_produit) VALUES (?,?,?)");
        $stmt->bindValue(1,$datetime);
        $stmt->bindValue(2,$id_user);
        $stmt->bindValue(3,$pro);
        

        if($stmt->execute()){
            echo "ok";
        }
        else{
            echo "something wong wrong";
        }

    }
    else{
        echo "le produit deja liked";
    }

    
    
    


?>
