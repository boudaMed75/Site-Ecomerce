<?php

    include_once "../config.php";


    $name = $_POST['name'];
    $date_debut = $_POST['promoStartDa'];
    $date_fin = $_POST['promoEndDate'];
    $per = $_POST['promoPercentage'];

    $req = $con->prepare("select name from codepromo where name = ?");
    $req->bindValue(1,$name);
    $req->execute();

    $names = $req->fetchAll(PDO::FETCH_COLUMN);
    if(count($names)===0){
    
        $stmt = $con->prepare("INSERT INTO codepromo (name,creadAt,date_debut,expiredAt,sold) VALUES (?,?,?,?,?)");
        $date = date('Y-m-d H:i:s'); 
        $datetime = date('Y-m-d H:i:s', strtotime($date)); 
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$datetime);
        $stmt->bindValue(3,$date_debut);
        $stmt->bindValue(4,$date_fin);
        $stmt->bindValue(5,$per);
        if($stmt->execute()){
            echo "ok";
        }
        else{
            echo "err lorsque de connexion avec server";
        }
    }
    else{
        echo "Le Code Promo  existe deja dans la base de donne" . $name ;
    }
    


?>