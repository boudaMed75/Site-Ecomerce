<!DOCTYPE html>
<html lang="en">
<?php include_once "phpFile/global/head.php" ?>


<body>
    <?php include_once "phpFile/global/header.php" ?>
    <?php include_once "phpFile/config.php" ?>

    <div class="container-err">
            <div class="err none">
                <p>messsage</p>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18 6l-12 12"></path>
                    <path d="M6 6l12 12"></path>
                </svg>
    
            </div>
        </div>
    

    <?php
        if(isset($_GET['id'])){
            if(!empty($_GET['id'])){
                $req = $con->prepare("
                        SELECT * from produit 
                        where
                        id = ?
                        
                ");
                $req->bindValue(1,$_GET['id']);
                $req -> execute();
                $res =$req-> fetchAll(PDO::FETCH_ASSOC);                
            }
        }

    ?>



    <div class="page">
    
        <div class="container">
           
            <div class="image">
                <?php

                    $req = $con->prepare("
                    SELECT p.title as title , m.id as id , m.src as src


                    FROM produit p , produit_imgs m


                    WHERE p.id =  m.id_produit AND m.id_produit = ? ;
                        
                    ");
                    $req->bindValue(1,$_GET['id']);
                    $req -> execute();
                    $res1 =$req-> fetchAll(PDO::FETCH_ASSOC);

                    foreach($res1 as $ele){
                        echo "<img src=\"imgs/Les_produit/product/products/".$ele['title']."/".$ele['src']."\" alt=\"\">";
                    }
                ?>
                
            </div>
            <div class="fillter">
                <div data-id="<?php echo $res[0]['id'] ?>" class="prodinfo">
                    <h2><?php echo $res[0]['title'] . " - " . $res[0]['description'] ?></h2>
                    <hr>
                    <h4>Prix</h4>
                    <div class="prix">
                        <h2>prix dans le panier</h2>
                        <p><?php echo $res[0]['prix'] ?>MAD</p>
                    </div>
                    <hr>
                    <h4>Taille</h4>
                    <div class="taille-container">
                        <?php
                            $req1 = $con->prepare("
                            SELECT * FROM size

                            WHERE 
                            
                            id in (SELECT id_size FROM produit_size WHERE id_produit = ?)
                                
                            ");
                            $req1->bindValue(1,$_GET['id']);
                            $req1 -> execute();
                            $res2 =$req1-> fetchAll(PDO::FETCH_ASSOC);
                            foreach($res2 as $ele){
                                echo "<span data-id = \"".$ele['id']."\" class=\"taille\">".$ele['name']."</span>";

                            }

                        ?>
                    </div>
                    <h4>colors</h4>
                    <div class="taille-container">
                        <?php
                            $req1 = $con->prepare("
                                SELECT * FROM colors WHERE


                                id in (SELECT id_color FROM produit_color WHERE id_produit = ? )
                            ");
                            $req1->bindValue(1,$_GET['id']);
                            $req1 -> execute();
                            $res2 =$req1-> fetchAll(PDO::FETCH_ASSOC);
                            foreach($res2 as $ele){
                                echo "<span style=\"background-color: ".$ele['name'].";\" data-id = \"".$ele['id']."\" class=\"color\"></span>";

                            }

                        ?>

                    </div>
                    <h4>quantite</h4>
                    <div data-q="<?php echo $res[0]['quantity'] ?>" class="quantite">
                        <span class="mois stop">-</span>
                        <span class="res" style="width : 70px">40</span>
                        <span class="plus">+</span>
                    </div>
                    
                    <button id="add_panier">AJOUTER AU PANIER</button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "phpFile/global/footer.php" ?>
    <script src="js Global/produit.js"></script>


</body>


