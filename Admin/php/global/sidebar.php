<div class="sidebar bg-white p-20 p-relative">
    <i class="fermer fa-solid fa-xmark"></i>
    <h3 class="p-relative txt-c mt-0">BBB</h3>
    <ul>
    <?php
        
        $icons = ["fa-solid fa-house","fa-sharp fa-solid fa-gear","fa-solid fa-user-nurse","python fa-sharp fa-solid fa-mug-saucer","python fa-sharp fa-solid fa-mug-saucer","fa-brands fa-python","fa-brands fa-python","fa-solid fa-play","fa-solid fa-book","fa-regular fa-file fa-fw","fa-solid fa-business-time","fa-solid fa-calendar-days"];
        $arr = ['home','demande','produit','ajouter produit','marque','categorie','souscategorie','CodePromo'];
        for($i=0;$i<count($arr);$i++){
            echo "<li>";
            if($arr[$i]==FileName()){
                echo "<a class=\"active d-flex align-center fs-14 c-black rad-6 p-10\" href=\"".$arr[$i].".php\">";
            }
            else{
                echo "<a class=\"d-flex align-center fs-14 c-black rad-6 p-10\" href=\"".$arr[$i].".php\">";
            }
            echo "<i class=\"".$icons[$i]."\"></i>";
            echo "<span>".$arr[$i]."</span>";

            echo "</a>";
            echo "</li>";
        }
    ?>
    </ul>
</div>