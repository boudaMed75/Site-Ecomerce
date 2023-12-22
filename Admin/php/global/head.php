
<?php
    
    include_once "php/autorise.php";
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo FileName() ?></title>
    <link rel="icon" href="../imgs/system/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/framework.css" />
    <link rel="stylesheet" href="../css/admin.css" />
    <link rel="stylesheet" href="../css/master.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>

<?php
    function FileName(){
        $p = parse_url($_SERVER['PHP_SELF'],PHP_URL_PATH);
        $base_name = basename($p);

        $file_name = pathinfo($base_name,PATHINFO_FILENAME);
        return $file_name;
    }
?>
