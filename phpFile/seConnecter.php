
<?php
    include_once "config.php";

    $name = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['phone'];
    $pass = $_POST['password'];
    $addres1 = $_POST['adresse1'];
    $addres2 = $_POST['adresse1'];

    
    $req = $con->prepare("select * from Utilisateur where email = ?");
    $req->bindValue(1,$email);
    $req->execute();
    $names = $req->fetchAll(PDO::FETCH_COLUMN);
    if(count($names)===0){
        // $date = date('Y-m-d H:i:s'); 
        // $datetime = date('Y-m-d H:i:s', strtotime($date)); 
        // $last_id = Last_Valeur_ID($con,"id","caffe","LO000");
        $stmt = $con->prepare("INSERT INTO Utilisateur (name,email,phone,password,adress1,adress2) VALUES (?,?,?,?,?,?)");
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$email);
        $stmt->bindValue(3,$telephone);
        $stmt->bindValue(4,$pass);
        $stmt->bindValue(5,$addres1);
        $stmt->bindValue(6,$addres2);
        if($stmt->execute()){
            echo "ok";
        }
        else{
            echo "err lorsque de connexion avec server";
        }
    }
    else{
        echo "Il existe deja une utilisateur avec se gmail" . $email ;
    }
    

    
?>
