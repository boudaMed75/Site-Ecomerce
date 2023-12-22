<?php

    include_once "../config.php";

    $name = $_POST['name'];
   
    $desc = $_POST['description'];
    $prix = $_POST['productPrice'];
    $quu = $_POST['productQuantity'];
    $solde = $_POST['solde'];
    $sous_cat = $_POST['sous_cat'];
    $marque = $_POST['marque'];
    $add_ossier = false;

    $req = $con->prepare("select title from produit where title = ?");
    $req->bindValue(1,$name);
    $req->execute();

    $names = $req->fetchAll(PDO::FETCH_COLUMN);
    if(count($names)===0){
        if(!empty($_FILES['image_cover']['name'])){
            $img_name = $_FILES['image_cover']['name'];
            $tmp_name = $_FILES['image_cover']['tmp_name'];
            $img_explod = explode('.',$img_name);
            $img_ext = end($img_explod);
            $extensions = ['png','jpeg','jpg'];
            if(in_array($img_ext,$extensions)===true){
                $new_image_name = $name.".".$img_ext;
                if(move_uploaded_file($tmp_name,"../../../imgs/les_produit/product/cover/".$new_image_name )){
                    $chemin_dossier_parent = "../../../imgs/les_produit/product/products/";

                    if (is_dir($chemin_dossier_parent)) {
                        
                        $chemin_nouveau_dossier = $chemin_dossier_parent . $name;

                        
                        if (!is_dir($chemin_nouveau_dossier)) {
                            
                            if (mkdir($chemin_nouveau_dossier,755,true)) {
                                $add_ossier = true;
                            } 
                        } else {
                            $add_ossier = true;
                        }
                    } 
                    $date = date('Y-m-d H:i:s'); 
                    $datetime = date('Y-m-d H:i:s', strtotime($date)); 
                    $stmt = $con->prepare("INSERT INTO produit (title,description,quantity,sold,prix,image_cover,createdAt,id_sous_cat,id_marque) VALUES (?,?,?,?,?,?,?,?,?)");
                    $stmt->bindValue(1,$name);
                    $stmt->bindValue(2,$desc);
                    $stmt->bindValue(3,$quu);
                    $stmt->bindValue(4,$solde);
                    $stmt->bindValue(5,$prix);
                    $stmt->bindValue(6,$new_image_name);
                    $stmt->bindValue(7,$datetime);
                    $stmt->bindValue(8,$sous_cat);
                    $stmt->bindValue(9,$marque);
                    
                    // add coulors 
                    // foreach($_POST['colors'] as $ele){

                    // }

                    if($stmt->execute() && $add_ossier){
                        $ntf = true;
                        $req = $con->prepare("select id from produit where title = ?");
                        $req->bindValue(1,$name);
                        $req->execute();

                        $names = $req->fetchAll(PDO::FETCH_ASSOC);
                        $id_pro = $names[0]['id'];
                        foreach($_POST['colors'] as $ele){
                            $stmt = $con->prepare("INSERT INTO produit_color (id_color,id_produit) VALUES (?,?)");
                            $stmt->bindValue(1,$ele);
                            $stmt->bindValue(2,$id_pro);
                            if(!$stmt->execute()){
                               $ntf = false; 
                            }

                        }
                        foreach($_POST['sizes'] as $ele){
                            $stmt = $con->prepare("INSERT INTO produit_size (id_size,id_produit) VALUES (?,?)");
                            $stmt->bindValue(1,$ele);
                            $stmt->bindValue(2,$id_pro);
                            if(!$stmt->execute()){
                                $ntf = false; 
                            }

                        }
                        if($ntf){
                            echo "ok";
                        }
                        else{
                            echo "Something Went wrong";
                        }
                        


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