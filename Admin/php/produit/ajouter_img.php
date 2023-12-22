<?php

    include_once "../config.php";


    $id = $_POST['id'];
    $req = $con->prepare("select * from produit where id = ?");
    $req->bindValue(1,$id);
    $req->execute();
    $names = $req->fetchAll(PDO::FETCH_ASSOC);
    $add_ossier = false;

    
    
        if(!empty($_FILES['image']['name'])){
            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $img_explod = explode('.',$img_name);
            $img_ext = end($img_explod);
            $extensions = ['png','jpeg','jpg'];
            if(in_array($img_ext,$extensions)===true){
                $time = time();
                $new_image_name = $names[0]['title'].$time.".".$img_ext;
                if(move_uploaded_file($tmp_name,"../../../imgs/les_produit/product/products/".$names[0]['title']."/".$new_image_name )){
                    $date = date('Y-m-d H:i:s'); 
                    $datetime = date('Y-m-d H:i:s', strtotime($date)); 
                    $stmt = $con->prepare("INSERT INTO produit_imgs (src,createdAt,id_produit) VALUES (?,?,?)");
                    $stmt->bindValue(1,$new_image_name);
                    $stmt->bindValue(2,$datetime);
                    $stmt->bindValue(3,$id);
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

   

?>