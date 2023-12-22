<!DOCTYPE html>
<html lang="en">
<?php include_once "phpFile/global/head.php" ?>


<body>
    <?php include_once "phpFile/global/isSign.php"  ?>
    <input id="sexe" type="hidden" value="<?php echo FileName(); ?>">
    
    <?php include_once "phpFile/global/header.php" ?>
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
    <div class="page">
        <div class="container">
            <div class="fillter">
            
                
                <?php include_once "phpFile/global/filter.php" ?>
            
            <div class="salle">
            </div>
        </div>
    </div>

    <?php include_once "phpFile/global/footer.php" ?>
    <script type="module" src="js Global/product.js"></script>
    <script src="js Global/filter.js"></script>

</body>