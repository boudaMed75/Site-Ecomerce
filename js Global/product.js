import {AfficheProduit,notification,fermernotification,removeLike,addLike,handlerLike} from "./helper/product_function.js";
import getmarque from "./helper/connexion.js";

const sexe = document.getElementById('sexe'),
div = document.querySelector('.salle'),
id_user = document.getElementById('authenticated_user').value;

const mainItems = document.querySelectorAll(
    '.main-item'
  );
  
  mainItems.forEach((mainItem) => {
    mainItem.addEventListener('click', () => {
      mainItem.classList.toggle(
        'main-item--open'
      );
    })
  });
  
  
  
  

getmarque("phpFile/product/getProduct.php?sexe="+sexe.value).then((data)=>{

    // getmarque("phpFile/like/getlike.php").then(data1=>{
    //     console.log(data1);
    //     AfficheProduit(div,data);


    // })

    AfficheProduit(div,data);

    handlerLike(data,id_user);

    

    

    let like_buttons = div.querySelectorAll('.like'),
    err = document.querySelector('.err');

    
   
    like_buttons.forEach((e)=>{
        e.onclick = ()=>{
            let id_produit = e.parentElement.dataset.id;
            
            if(!e.classList.contains('red')){
                err.classList.remove("none");
                if(id_user==="none"){
                    notification(err,"red","se connecter pour like des produit");
                    fermernotification(err,3000);
                }
                else{
                    addLike(e,err,id_produit,id_user);
                }
                
            }
            else{
                removeLike(e,err,id_produit,id_user);
                // console.log("remove like");
                // e.classList.remove("red");
                
            }
        }
    });

});
