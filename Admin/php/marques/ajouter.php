<?php

    include_once "../config.php";


    $name = $_POST['name'];
    $date = $_POST['date_start'];

    $req = $con->prepare("select name from marque where name = ?");
    $req->bindValue(1,$name);
    $req->execute();

    $names = $req->fetchAll(PDO::FETCH_COLUMN);
    if(count($names)===0){
        if(!empty($_FILES['marque_img']['name'])){
            $img_name = $_FILES['marque_img']['name'];
            $tmp_name = $_FILES['marque_img']['tmp_name'];
            $img_explod = explode('.',$img_name);
            $img_ext = end($img_explod);
            $extensions = ['png','jpeg','jpg'];
            if(in_array($img_ext,$extensions)===true){
                $new_image_name = $name.".".$img_ext;
                if(move_uploaded_file($tmp_name,"../../../imgs/les_produit/marque/".$new_image_name )){
                    $stmt = $con->prepare("INSERT INTO marque (name,img,date_ajouter) VALUES (?,?,?)");
                    $stmt->bindValue(1,$name);
                    $stmt->bindValue(2,$new_image_name);
                    $stmt->bindValue(3,$date);
                   
                    if($stmt->execute()){
                        echo "ok";
                    }
                    else{
                        echo "Something Went wrong";
                    }
                }
                else{
                    echo "error de fichier";
                }
            }
            else{
                echo "please select an image file - jpeg ,jpg , png ! ";
            }
        }
        else{
            echo "please select an image file - jpeg ,jpg , png ! ";
        }
    }
    else{
        echo "La marque existe deja dans la base de donne" . $name ;
    }
    


?>