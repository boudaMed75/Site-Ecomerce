<?php

    include_once "../config.php";


    $name = $_POST['name'];
    $date_debut = $_POST['promoStartDa'];
    $date_fin = $_POST['promoEndDate'];
    $per = $_POST['promoPercentage'];
    $id = $_POST['id'];

    echo $name;



    $stmt = $con->prepare("UPDATE codepromo SET 
            name = ? , date_debut = ? ,expiredAt = ? ,sold = ? 
            where id = ?
    ");
   
    $stmt->bindValue(1,$name);
    $stmt->bindValue(2,$date_debut);
    $stmt->bindValue(3,$date_fin);
    $stmt->bindValue(4,$per);
    $stmt->bindValue(5,$id);
    if($stmt->execute()){
        echo "OK";
    }
    else{
        echo "err lorsque de connexion avec server";
    }
    
    


?>