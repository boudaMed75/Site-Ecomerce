<?php
    function FileName(){
        $p = parse_url($_SERVER['PHP_SELF'],PHP_URL_PATH);
        $base_name = basename($p);

        $file_name = pathinfo($base_name,PATHINFO_FILENAME);
        return $file_name;
    }
    session_start(); 
     
    $sexe = FileName();
    include_once "phpFile/config.php" 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo FileName() ?></title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>