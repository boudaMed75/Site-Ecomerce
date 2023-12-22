
<?php

    include_once "../config.php";
    $req = $con->prepare("SELECT * FROM colors");
    $req -> execute();
    $res =$req-> fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($res);


?>
