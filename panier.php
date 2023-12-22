<!DOCTYPE html>
<html lang="en">
<?php include_once "phpFile/global/head.php" ?>


<body>
    <input id="sexe" type="hidden" value="<?php echo FileName(); ?>">
    <?php include_once "phpFile/global/header.php" ?>

    <div class="panier">
        <div class="container">
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
                    

                 

            ?>
            <div class="liste_panier">
                <?php

                    $req = $con->prepare("
                    SELECT * FROM comnade WHERE id_user = ?
                    ");
                    $req->bindValue(1,$_SESSION['id']);
                    $req -> execute();
                    $res =$req-> fetchAll(PDO::FETCH_ASSOC);
                    $prix = 0;
                    $solde = 0 ;
                    foreach($res as $ele){
                            
                            $produit = $con->prepare("
                            SELECT * FROM produit WHERE id = ?
                            ");
                            $produit->bindValue(1,$ele['id_produit']);
                            $produit -> execute();
                            $produits =$produit-> fetchAll(PDO::FETCH_ASSOC);

                            // 
                            $size = $con->prepare("
                            SELECT * FROM size WHERE id = ?
                            ");
                            $size->bindValue(1,$ele['id_size']);
                            $size -> execute();
                            $sizes =$size-> fetchAll(PDO::FETCH_ASSOC);

                            // 
                            $color = $con->prepare("
                            SELECT * FROM colors WHERE id = ?
                            ");
                            $color->bindValue(1,$ele['id_colors']);
                            $color -> execute();
                            $colors =$color-> fetchAll(PDO::FETCH_ASSOC);

                            $prix = $prix + $produits[0]['prix'];
                            $solde = $solde + $produits[0]['sold'];


                            
                            echo "<div class=\"article\">
                                    <div class=\"img\">
                                        <img src=\"imgs/vet.jpg\" alt=\"\">
                                        <div class=\"artinfo\">
                                            <h2>".$produits[0]['title']."</h2>
                                            <p>Taille: <span>".$sizes[0]['name']."</span></p>
                                            <p>Couleur: <span>".$colors[0]['name']."</span></p>
                                        </div>
                                    </div>
                                    
                                    <div class=\"prix\">
                                    <p style=\" text-decoration: line-through\">".$produits[0]['prix']."MAD</p>
                                    ".$produits[0]['prix'] - $produits[0]['prix'] * ($produits[0]['sold'] / 100) ."MAD</div>
                                </div>";



                    }

                ?>
                <!-- <div class="article">
                    <div class="img">
                        <img src="imgs/vet.jpg" alt="">
                        <div class="artinfo">
                            <h2>ensemble</h2>
                            <p>Taille: <span>36-33</span></p>
                            <p>Couleur: <span>Black Rodeo</span></p>
                        </div>
                    </div>
                    <div class="prix">233MAD</div>
                </div>
                <div class="article">
                    <div class="img">
                        <img src="imgs/vet.jpg" alt="">
                        <div class="artinfo">
                            <h2>ensemble</h2>
                            <p>Taille: <span>36-33</span></p>
                            <p>Couleur: <span>Black Rodeo</span></p>
                        </div>
                    </div>
                    <div class="prix">233MAD</div>
                </div>
                <div class="article">
                    <div class="img">
                        <img src="imgs/vet.jpg" alt="">
                        <div class="artinfo">
                            <h2>ensemble</h2>
                            <p>Taille: <span>36-33</span></p>
                            <p>Couleur: <span>Black Rodeo</span></p>
                        </div>
                    </div>
                    <div class="prix">233MAD</div>
                </div>
                <div class="article">
                    <div class="img">
                        <img src="imgs/vet.jpg" alt="">
                        <div class="artinfo">
                            <h2>ensemble</h2>
                            <p>Taille: <span>36-33</span></p>
                            <p>Couleur: <span>Black Rodeo</span></p>
                        </div>
                    </div>
                    <div class="prix">233MAD</div>
                </div> -->
            </div>
            <div class="dashbord">

                <div class="card_info">
                    <h2>RÉCAPITULATIF DE LA COMMANDE</h2>
                    <div class="box">
                        <h4>Total de l article</h4>
                        <p><?php echo $prix ?>MAD</p>
                    </div>
                    <div class="box">
                        <h4>Réductions</h4>
                        <p><?php echo $solde ?>MAD</p>
                    </div>
                    <div class="box">
                        <h4>Frais d'expédition</h4>
                        <p>50MAD</p>
                    </div>
                    <div class="box">
                        <h4>TOTAL</h4>
                        <p><?php echo $prix - $solde ?>MAD</p>
                    </div>
                    <div class="box code">
                        <p>Entrer le code promo</p>
                        <p>+</p>
                    </div>
                    <div class="code_promo d-none">
                        <input type="text">
                        <button>utiliser</button>
                    </div>
                    <button class="valider">passez a l'etape de paiyement</button>
                </div>
            </div>

            <?php
                 }
            ?>
        </div>
        
        
        
    </div>

    <?php include_once "phpFile/global/footer.php" ?>

    <script src="js Global/panier.js"></script>

                    
</body>