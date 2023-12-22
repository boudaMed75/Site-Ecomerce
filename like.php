<!DOCTYPE html>
<html lang="en">
<?php include_once "phpFile/global/head.php" ?>


<body>
    <input id="sexe" type="hidden" value="<?php echo FileName(); ?>">
    <?php include_once "phpFile/global/header.php" ?>

    <div class="page">
        <?php

            if(!isset($_SESSION['authenticated_user'])){
               ?>
               <div class="container h100v">
            
                    <div class="no_result">
                        <h2>se connecter pour liked des produit</h2>
                    </div>
                
                
            </div>
        <?php     
            }
            else{
                $req = $con->prepare("
                    SELECT * FROM produit

                    WHERE id in (SELECT id_produit from liked WHERE id_user = ? )
                ");
                $req->bindValue(1,$_SESSION['id']);
                $req -> execute();
                $res =$req-> fetchAll(PDO::FETCH_ASSOC);
                if(count($res)===0){
                    ?>
                    <div class="container h100v">
                            
                            <div class="no_result">
                                <h2>aucun produit liked</h2>
                            </div>
                        
                        
                    </div>
                    <?php
                }
                else{

                
    

                ?>
                <div class="aff-liked container aff-like">

                    <?php
                        foreach($res as $ele){
                            ?>
                                <div data-id="<?php echo $ele['id']?>" class="cards">
                                    <i class="fa-solid fa-heart like red" id="like"></i>
                                    <img src="imgs/les_produit/product/cover/<?php echo $ele['image_cover']?>" alt="" >
                                    <div class="definetion">
                                    <a href="produit.php?id=<?php echo $ele['id']?>">
                                    <h3><?php echo $ele['title']?></h3>
                                    <p><?php echo $ele['description']?></p>
                                    <div class="prix">
                                        <h2>prix dans le panier</h2>
                                        <p><?php echo $ele['prix']?>MAD</p>
                                    </div>
                                    </a>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>

                </div>
            <?php
                }
            }

        ?>
        
    </div>

    <?php include_once "phpFile/global/footer.php" ?>
    <!-- <script src="js Global/product.js"></script> -->


</body>