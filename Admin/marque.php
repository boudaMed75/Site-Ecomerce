<!-- ajouter et suprier une category  -->

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="add_category" method="post">
        <label for="">name :</label><br>
        <input type="text" name="name"><br>
        <label for="">img</label><br>
        <input type="text" name="img">
        <br>
        <input type="submit" value="ajouter">
    </form>
    <script src="js/marque.js"></script>
</body>
</html> -->

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
            <div class="tache_select">
                <div data-type="affichage" class="selected">Les Code promo</div>
                <div data-type="ajouter">Ajouter Nouveau</div>
            </div>
            
            <div id="project" class="p-20 bg-white rad-10 m-20">
              
           
            
            </div> 
            <!-- <div id="project" class="p-20 bg-white rad-10 m-20">
              <div class="card-body">
                  <h4 class="title text-center mt-4">Ajout de catégories</h4>
                  <form id="add_category" class="form-box px-3">
                      <div class="form-input">
                        <span><i class="fa fa-tag"></i></span>
                        <input type="text" name="name" placeholder="Nom de la catégorie" required>
                      </div>
                      <div class="">
                            <label class="fs-14 c-grey d-block mb-10" for="img">SELECT AN IMAGE</label>
                            <input id="img" type="file" name="marque_img">
                      </div>
                      <div class="form-input">
                        <span><i class="fa fa-calendar"></i></span>
                        <input type="date" name="date_start" placeholder="Date de début" required>
                    </div>
                    
                    <div class="mb-3">
                      <button type="submit" class="btn btn-block text-uppercase">Ajouter Produit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div> -->
            
        </div>
    </div>

    <script src="js/marque.js"></script>
    <script src="js/global.js"></script>

</body>
</html>