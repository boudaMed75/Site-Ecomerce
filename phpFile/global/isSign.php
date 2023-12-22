<?php

    if(isset($_SESSION['authenticated_user'])){
        echo "<input id='authenticated_user' type=\"hidden\" value=\"".$_SESSION['id'] ."\">";
    }
    else{
        echo "<input id='authenticated_user' type=\"hidden\" value=\"none\">";
    }

?>