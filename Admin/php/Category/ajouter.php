<?php

    include_once "../config.php";


    $name = $_POST['name'];
    $sexe = $_POST['sexe'];
    $desc = $_POST['description'];

    $req = $con->prepare("select name from category where name = ? and sexe = ?");
    $req->bindValue(1,$name);
    $req->bindValue(2,$sexe);
    $req->execute();

    $names = $req->fetchAll(PDO::FETCH_COLUMN);
    if(count($names)===0){
        if(!empty($_FILES['cat_img']['name'])){
            $img_name = $_FILES['cat_img']['name'];
            $tmp_name = $_FILES['cat_img']['tmp_name'];
            $img_explod = explode('.',$img_name);
            $img_ext = end($img_explod);
            $extensions = ['png','jpeg','jpg'];
            if(in_array($img_ext,$extensions)===true){
                $new_image_name = $name.$sexe.".".$img_ext;
                if(move_uploaded_file($tmp_name,"../../../imgs/les_produit/category/".$new_image_name )){
                    $date = date('Y-m-d H:i:s'); 
                    $datetime = date('Y-m-d H:i:s', strtotime($date)); 
                    $stmt = $con->prepare("INSERT INTO category (name,img,createAt,description,sexe) VALUES (?,?,?,?,?)");
                    $stmt->bindValue(1,$name);
                    $stmt->bindValue(2,$new_image_name);
                    $stmt->bindValue(3,$datetime);
                    $stmt->bindValue(4,$desc);
                    $stmt->bindValue(5,$sexe);

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
        echo "La categorie existe deja dans la base de donne" . $name ;
    }
    


?>