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
            <div class="tache_select">
                <div data-type="affichage" class="selected">Les Code promo</div>
                <div data-type="ajouter">Ajouter Nouveau</div>
            </div>
            <div id="filtre" class="filtre">
                <select name="" id="">
                    
                </select>
            </div>

            <div id="filtre_cat" class="d-none filtre">
                <select name="" id="">
                    
                </select>
            </div>

            <div id="project" class="p-20 bg-white rad-10 m-20">
              
            </div>
        </div>
    </div>
    <script src="js/souscategory.js"></script>
    <script src="js/global.js"></script>
</body>
</html>