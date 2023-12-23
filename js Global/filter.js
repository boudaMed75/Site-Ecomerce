
// console.log("bouda");

import getmarque from "./helper/connexion.js";

const se = document.getElementById('sexe'),
filter_colors = document.getElementById('colors'),
filter_size = document.getElementById('size'),
filter_marque = document.getElementById('marque'),
categories = document.getElementById('categories'),
sousCategories = document.getElementById('sousCategories'),
div_aff = document.querySelector('.salle');

let colors = document.querySelectorAll('#colors ul li span');


console.log(colors);

colors.forEach(e => {

    e.onclick = () =>{
        removeActive(colors,"selected_col");
        e.classList.add('selected_col');
        console.log(e.dataset.id);
        getmarque("phpFile/product/filterColors.php?color="+e.dataset.id+"&&sexe="+se.value).then((data)=>{

            // console.log(data);

            if(data.length===0){
                div_aff.style.display = "block";
                div_aff.innerHTML = `
                
                    <div class="no_result">
                        <h2>Aucun resultat trouver</h2>
                    </div>
                `;
            }
            else{
                
                handler(div_aff,data);

            }
            
        
        });
    }
    
});

filter_size.querySelectorAll('ul li').forEach((e)=>{

    e.onclick = ()=>{
        getmarque("phpFile/product/filteSize.php?size="+e.dataset.id+"&&sexe="+se.value).then((data)=>{
            console.log(data);
        })
    }

})



filter_marque.querySelectorAll('ul li').forEach((e)=>{
    e.onclick = ()=>{
        getmarque("phpFile/product/filtermarque.php?id="+e.dataset.id+"&&sexe="+se.value).then((data)=>{

            if(data.length===0){
                div_aff.style.display = "block";
                div_aff.innerHTML = `
                
                    <div class="no_result">
                        <h2>Aucun resultat trouver</h2>
                    </div>
                `;
            }
            else{
                
                handler(div_aff,data);

            }
            
        
        });
    
    }
    
})

sousCategories.querySelectorAll('ul li').forEach((e)=>{
    e.onclick = ()=>{
        getmarque("phpFile/product/filtersouscategory.php?id="+e.dataset.id+"&&sexe="+se.value).then((data)=>{

            if(data.length===0){
                div_aff.style.display = "block";
                div_aff.innerHTML = `
                
                    <div class="no_result">
                        <h2>Aucun resultat trouver</h2>
                    </div>
                `;
            }
            else{
                
                handler(div_aff,data);

            }
            
        
        });
    
    }
    
})

categories.querySelectorAll('ul li').forEach((e)=>{
    e.onclick = ()=>{
        getmarque("phpFile/product/filtercategory.php?id="+e.dataset.id+"&&sexe="+se.value).then((data)=>{

            if(data.length===0){
                div_aff.style.display = "block";
                div_aff.innerHTML = `
                
                    <div class="no_result">
                        <h2>Aucun resultat trouver</h2>
                    </div>
                `;
            }
            else{
                
                handler(div_aff,data);

            }
            
        
        });
    
    }
    
})


function handler(div,data){
    div.style.display = "grid";
    let cards = "";
    console.log(data);
    data.forEach(ele => {
        cards +=  `
        
            
                <div data-id=${ele['id']} class="cards p-relative">
                    <i class="fa-solid fa-heart like" id="like"></i>
                    
                    <img src="imgs/les_produit/product/cover/${ele['image_cover']}" alt="" >
                    <div class="definetion">
                    <a href="produit.php?id=${ele['id']}">
                    <h3>${ele['title']}</h3>
                    <p>${ele['description']}</p>
                    <p style=\" text-decoration: line-through\">${ele['prix']}MAD</p>
                    <div class="prix">
                        <h2>prix dans le panier</h2>
                        <p>${ele['prix'] - ele['prix'] * (ele['sold'] / 100)}MAD</p>
                    </div>
                    </a>
                    </div>
                    
                    
                </div>
            
        `;
        
        
    });
    div.innerHTML = cards;

    
    let like_button = div.querySelectorAll('.like'),
    err = document.querySelector('.err'),
    err_mesg = err.querySelector('p');
    console.log(err);


    like_button.forEach((e)=>{
       
        e.onclick = ()=>{
            console.log("bouda");
            
            if(authenticated_user.value==="non"){
                
                err.style.backgroundColor = "red";
                err_mesg.textContent = "se connecter pour ajouter des produit au panier" ;
                document.querySelector('svg').onclick = ()=>{
                    err.classList.add('none');
                }
                setTimeout(()=>{
                    err.classList.add('none');
                },3000);
    
            }
            else{
                // console.log(e.parentElement.dataset.id);
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "phpFile/product/likeproduit.php", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            let data = xhr.response;
                            console.log(data);
                            
                            e.classList.toggle('red');
                            if(data === "ok"){
                                             
                                
                                err.style.backgroundColor = "#327B32";
                                err_mesg.textContent = "le produit ajouter avec succes";
                            }
                            else{
                                
                                err.style.backgroundColor = "red";
                                err_mesg.textContent = 'error au server' ;
                            }
                            document.querySelector('svg').onclick = ()=>{
                                err.classList.add('none');
                            }
                            setTimeout(()=>{
                                err.classList.add('none');
                            },3000);
                        }
                    }
                };

                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send(`id_pro=${e.parentElement.dataset.id}&&id_user=${authenticated_user.value}`);
                // let formData = new FormData(form);
                // xhr.send(formData);
            }
        }
    })
 
}




function removeActive(ele,classe){
    ele.forEach(e=>{
        e.classList.remove(classe);
    })
}
