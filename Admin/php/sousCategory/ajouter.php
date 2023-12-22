<?php

    include_once "../config.php";


    $name = $_POST['name'];
    $des = $_POST['description'];
    $id = $_POST['cat'];

    $req = $con->prepare("select name from souscategory where name = ? and id_cat = ?");
    $req->bindValue(1,$name);
    $req->bindValue(2,$id);

    $req->execute();

    $names = $req->fetchAll(PDO::FETCH_COLUMN);
    if(count($names)===0){
    
        $stmt = $con->prepare("INSERT INTO souscategory (name,CreateAt,id_cat,description) VALUES (?,?,?,?)");
        $date = date('Y-m-d H:i:s'); 
        $datetime = date('Y-m-d H:i:s', strtotime($date)); 
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$datetime);
        $stmt->bindValue(3,$id);
        $stmt->bindValue(4,$des);
        if($stmt->execute()){
            echo "ok";
        }
        else{
            echo "err lorsque de connexion avec server";
        }
    }
    else{
        echo "La Souscategorie existe deja dans la base de donne" . $name ;
    }
    


?>