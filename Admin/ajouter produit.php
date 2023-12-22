<!DOCTYPE html>
<html lang="en">
    <?php
        include_once "php/global/head.php";
        include_once "php/config.php";
    ?>
<body>
    <div class="page d-flex">
        <?php include_once "php/global/sidebar.php" ?>
        <div class="content w-full">
            <div class="head bg-white p-15 between-flex">
            <?php include_once "php/global/header.php" ?>
            </div>
            <div id="project" class="p-20 bg-white rad-10 m-20">
            <div class="card-body">
          <h4 class="title text-center mt-4">Ajout de produits</h4>
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
          <form id="add_product" class="form-box px-3">
            <div class="form-input">
              <span><i class="fa fa-tag"></i></span>
              <input type="text" name="name" placeholder="Nom du Produit" required>
            </div>
            <div class="">
                <label class="fs-14 c-grey d-block mb-10" for="img">SELECT AN IMAGE</label>
                <input id="img" type="file" name="image_cover" require>
            </div>
            <div class="form-input mt-20">
              <span><i class="fa fa-info-circle"></i></span>
              <textarea  name="description" placeholder="     Description du Produit" class="form-control" required></textarea>
            </div>
            <br>
            <div class="form-input">
              <span><i class="fa fa-money"></i></span>
              <input type="number" name="productPrice" placeholder="Prix" required>
            </div>
           
            <div class="form-input">
              <span><i class="fa fa-cubes"></i></span>
              <input type="number" name="productQuantity" placeholder="Quantité à Ajouter" required>
            </div>

            <div class="form-input">
              <span><i class="fa fa-cubes"></i></span>
              <input type="number" name="solde" placeholder="solde" required>
            </div>
            <div class="form-input mt-20">
                <span><i class="fa fa-tags"></i></span>
                <select id="sexe" name="sexe" required>
                    
                    
                    
                </select>
            </div>
            <div id="cat" class="form-input d-none">
              <span><i class="fa fa-tags"></i></span>
              <select  name="sous_cat" required>
                
                
                
              </select>
            </div>
            
            <div class="form-input">
              <span><i class="fa fa-tags"></i></span>
              <select id="marque" name="marque" required>
                
                
              </select>
            </div>

            <div class="form-input mt-20">
              <label class="fs-14 c-grey d-block mb-10" for="img">choisir les colors :</label>
              <div id="colors" class="colors">
              
               
               
                
              </div>
            </div>
          
                
          <div class="form-input">
              <label class="fs-14 c-grey d-block mb-10" for="img">choisir les taille :</label>
              <div id="size" class="colors">
              
               
               
                
              </div>
          </div>
              
            
            
            

          <div class="mb-3">
              <button type="submit" class="btn btn-block text-uppercase">Ajouter Produit</button>
            </div>
          </form>
        </div>
            </div>
        </div>
    </div>
    <script src="js/ajouter produit.js"></script>
    <script src="js/global.js"></script>
</body>
</html>