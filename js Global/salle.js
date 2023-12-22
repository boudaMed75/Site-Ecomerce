
const sexe = document.getElementById('sexe'),
div = document.querySelector('.salle'),
authenticated_user = document.getElementById('authenticated_user');

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
  
  
  
  

getmarque("phpFile/product/getProductSolde.php").then((data)=>{
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
    

});


async function getmarque(url){

    try{
        let mydata = await fetch(url);
        return await mydata.json();
    }catch(err){
        return "err";
    }
        

}

