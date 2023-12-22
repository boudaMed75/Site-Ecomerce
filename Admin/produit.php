<!DOCTYPE html>
<html lang="en">
    <?php
        include_once "php/global/head.php";
    ?>
<body>
    <div class="page d-flex">
        <?php include_once "php/global/sidebar.php" ?>
        <div class="content w-full">
            <div class="head bg-white p-15 between-flex">
            <?php include_once "php/global/header.php" ?>
            </div>

            <div id="project" class="p-20 courses-page bg-white rad-10 m-20">

            
            <!-- <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">
          <h4 class="title text-center mt-4">Ajout de produits</h4>
          <form class="form-box px-3">
            <div class="form-input">
              <span><i class="fa fa-tag"></i></span>
              <input type="text" name="productName" placeholder="Nom du Produit" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-image"></i></span>
              <input type="text" name="productImage" placeholder="URL de l'Image" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-info-circle"></i></span>
              <textarea name="productDescription" placeholder="     Description du Produit" class="form-control" required></textarea>
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
              <span><i class="fa fa-tags"></i></span>
              <select name="productCategory" required>
                <option value="" disabled selected>Choisissez une Catégorie</option>
                <option value="categorie1">Catégorie 1</option>
                <option value="categorie2">Catégorie 2</option>
                
              </select>
            </div>
            
            <div class="form-input">
              <span><i class="fa fa-tags"></i></span>
              <select name="productSubCategory" required>
                <option value="" disabled selected>Choisissez une Sous Catégorie</option>
                <option value="subCategory1">Sous-catégorie 1</option>
                <option value="subCategory2">Sous-catégorie 2</option>
                
              </select>
            </div>
            
            <div class="form-input">
              <span><i class="fa fa-tag"></i></span>
              <input type="text" name="productBrand" placeholder="Marque" required>
            </div>
            
            <div class="form-input">
              <span><i class="fa fa-paint-brush"></i></span>
              <input type="text" name="productColor" placeholder="Couleur" required>
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-block text-uppercase">Ajouter Produit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> -->
        </div>
    </div>
    <script src="js/produit.js"></script>
    <script src="js/global.js"></script>
</body>
</html>