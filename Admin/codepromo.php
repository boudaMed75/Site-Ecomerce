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

                <!-- <div class="card-style">
                  <h3>code promo</h3>
                  <p>du 01/2023</p>
                  <p>jusqua 01/2023</p>
                  <p>30%</p>
                  <span class="modifier">modifer</span>
                  <span class="suprimer">suprimer</span>
                </div>

                <div class="card-style">
                  bouda
                </div>
                <div class="card-style">
                  bouda
                </div>  -->
                    
                    <!-- <div class="contenu">
                      <div class="card-body">
                          <h4 class="title text-center mt-4">Ajout de Code Promo</h4>
                          <form id="add_codepromo" class="form-box px-3">
                              <div class="form-input">
                                <span><i class="fa fa-ticket"></i></span>
                                <input type="text" name="name" placeholder="Code Promo" required>
                              </div>
                              <div class="form-input">
                                <span><i class="fa fa-calendar"></i></span>
                                <input type="date" name="promoStartDa" placeholder="Date de début" required>
                              </div>
                              <div class="form-input">
                                <span><i class="fa fa-calendar"></i></span>
                                <input type="date" name="promoEndDate" placeholder="Date de fin" required>
                              </div>
                              <div class="form-input">
                                <span><i class="fa fa-percent"></i></span>
                                <input type="number" name="promoPercentage" placeholder="Pourcentage de Réduction" required>
                              </div>

                              <div class="mb-3">
                                <button type="submit" class="btn btn-block text-uppercase">Ajouter Code Promo</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    
                  
            </div>
    </div> -->
</div>
    <script src="js/codepromo.js"></script>
    <script src="js/global.js"></script>
</body>
</html>

