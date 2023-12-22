const div = document.getElementById('project');


getmarque("php/produit/get.php").then((data)=>{
    let cards = "";
    console.log(data);
    data.forEach(ele => {
        

        cards += `

            <div data-id=${ele['id']} class="course c-pointer bg-white rad-6 p-relative">
                    <img class="cover" src="../imgs/les_produit/product/cover/${ele['image_cover']}" alt="" />
                    
                    <div class="p-20">
                        <h4 class="m-0">${ele['title']}</h4>
                        <p class="description c-grey mt-15 fs-14">
                        ${ele['prix']}
                        </p>
                        <p>${ele['prix'] -  ele['prix'] * (ele['sold']/100)}</p>
                    </div>
                
    
                    
            </div>
        `;
        
    });

    div.innerHTML = cards;
    // let add_picture = document.querySelectorAll(".course .ajouter_photo");
    // add_picture.forEach((ele)=>{
    //     ele.addEventListener("click", () => {
    //         ajouter_photo(data,ele.parentElement.dataset.id);
           
    
    //     });
    // })
    let produit = document.querySelectorAll('.course');

    produit.forEach((e)=>{
        e.onclick = () => {
            let id_mo = e.dataset.id;
            var div = document.createElement("div");
            div.className = "arriere bg-white p-15";
            document.body.style.overflow = "hidden";
            document.body.appendChild(div);
            
            div.innerHTML = `
                <i class="fermer fa-solid fa-xmark"></i>
                <div class="page d-flex">
                    <div class="sidebar-p bg-white p-20 p-relative">
                        <ul>
                            <li class="active" data-section="images">Les image de produit</li>
                            <li data-section="modifier">modifier le produit</li>
                            <li data-section="suprimer">suprimer le produit</li>
                            <li data-section="review">les review</li>
                        </ul>
                    </div>
                    <div class="content w-full">
                        <div class="page_2eme m-20 p-20  rad-10">
    
                        </div>
                    </div>
                </div>
    
            `;
            contenu("images",id_mo);
            let nav_bar = div.querySelectorAll("ul li");
            console.log(nav_bar);
            nav_bar.forEach((e)=>{
                e.onclick = ()=>{
                    nav_bar.forEach((e)=>{
                        e.classList.remove("active");
                    })
                    e.classList.add("active");
                    contenu(e.dataset.section,id_mo);
                }
            });
                div.querySelector("i").onclick = ()=>{
                    document.body.style.overflow = "scroll";
                    div.remove();
               };
         };
    });
    
})

function contenu(section,id){
    let content = document.querySelector(".content .page_2eme");
    console.log(id)
    if(section==="images"){
        content.innerHTML = `
           
            <div class="card-body bg-white">
                <h4 class="title text-center mt-4">Ajouter une photo</h4>
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
                <form id="add_codepromo" class="form-box px-3">
                    <div class="form-input">
                    <input type="hidden" name="id" value="${id}">
                    </div>
                    <div class="">
                        <label class="fs-14 c-grey d-block mb-10" for="img">SELECT AN IMAGE</label>
                        <input  id="img" type="file" name="image" require>
                    </div>
                </form>
            </div>

            <div id="img_container" class="courses-page bg-white rad-10 mt-20">
                
                

            </div>

        `;

        let form = content.querySelector('form'), 
            image_input = document.getElementById('img'),
            div_aff = document.getElementById('img_container'),
            err = document.querySelector('.err'),
            err_mesg = err.querySelector('p');
        image_input.onchange = ()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/produit/ajouter_img.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        err.classList.remove('none');
                    if(data === "ok"){
                       image_input.value = "";
                        
                        
                        err.style.backgroundColor = "#327B32";
                        err_mesg.textContent = "le produit ajouter avec succes";
                        liste_img(div_aff,id);
                    }
                    else{
                        
                        err.style.backgroundColor = "red";
                        err_mesg.textContent = data ;
                    }
                    document.querySelector('svg').onclick = ()=>{
                        err.classList.add('none');
                    }
                    }
                }
            };
            let formData = new FormData(form);
            xhr.send(formData);
        }
        liste_img(div_aff,id);

    }
    if(section==="modifier"){
        content.innerHTML = "";
    }
    if(section==="suprimer"){
        
        content.innerHTML = `
           
        `;
        const FormDiv =  content.querySelector("form");
        //ajouter_une_tache(FormDiv,"m",id_mo);
        
        
        let Options = content.querySelectorAll(".tache_select div");
        Options.forEach(e=>{
            e.addEventListener("click", () => {
                const dataType = e.getAttribute("data-type");
                removeSelected(Options);
                e.classList.add("selected");
                if(dataType==="m"){
                    ajouter_une_tache(FormDiv,dataType,id_mo);
                }
                else{
                    ajouter_une_tache(FormDiv,dataType,id_mo);
                    ajouter_taches_youtube(FormDiv);
                }
            });
        });

    }
    if(section==="review"){
        content.innerHTML = "";
    }

}

function ajouter_photo(id){
    var div = document.createElement("div");
    div.className = "arriere p-15";
    document.body.style.overflow = "hidden";


    var box = document.createElement("div");
    box.className = "box";

    box.innerHTML = `
    
    <div class="card-body">
    <h4 class="title text-center mt-4">Ajouter une photo</h4>
    <form id="add_codepromo" class="form-box px-3">
        <div class="form-input">
          <input type="hidden" name="id" value="${id}">
        </div>
        <div class="">
            <label class="fs-14 c-grey d-block mb-10" for="img">SELECT AN IMAGE</label>
            <input id="img" type="file" name="image_cover" require>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-block text-uppercase">Ajouter Code Promo</button>
        </div>
    </form>
  </div>
    `;
    div.appendChild(box);

    
    document.body.appendChild(div);

    let form = box.querySelector('form');
    form.onsubmit = (e)=>{
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/codepromo/update.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    if(data!=="ok"){
                        eleve_fenetre(div);
                        Contenu(div_aff,'affichage');
                    }
                    else{
                        console.log("non");
                    }
                }
            }
        };
        let formData = new FormData(form);
        xhr.send(formData);
    };


    div.querySelector('.fermer').onclick = () => {
        eleve_fenetre(div);
    }

}

function formule(ele) {
    

    var div = document.createElement("div");
    div.className = "arriere p-15";
    document.body.style.overflow = "hidden";


    var box = document.createElement("div");
    box.className = "box";

    box.innerHTML = `
    
    <div class="card-body">
    <h4 class="title text-center mt-4">Ajout de Code Promo</h4>
    <form id="add_codepromo" class="form-box px-3">
        <div class="form-input">
          <span><i class="fa fa-ticket"></i></span>
          <input type="hidden" name="id" value="${ele['id']}">
          <input type="text" name="name" placeholder="Code Promo" value="${ele['name']}" required>
        </div>
        <div class="form-input">
          <span><i class="fa fa-calendar"></i></span>
          <input type="date" name="promoStartDa" placeholder="Date de début" value="${ele['date_debut']}" required>
        </div>
        <div class="form-input">
          <span><i class="fa fa-calendar"></i></span>
          <input type="date" name="promoEndDate" placeholder="Date de fin" value="${ele['expiredAt']}" required>
        </div>
        <div class="form-input">
          <span><i class="fa fa-percent"></i></span>
          <input type="number" name="promoPercentage" placeholder="Pourcentage de Réduction" value="${ele['sold']}" required>
        </div>

        <div class="mb-3">
          <button type="submit" class="btn btn-block text-uppercase">Ajouter Code Promo</button>
        </div>
    </form>
  </div>
    `;

    // Créer l'élément h3 avec le texte "voulez vous vraiment quitter ?"
   

    // Créer le bouton "quitter"
    var quitterButton = document.createElement("button");
    quitterButton.id = "quitter";
    quitterButton.textContent = "quitter";

    

    // Ajouter les éléments boutons à la div avec la classe "box"
    
    box.appendChild(quitterButton);
    

    // Ajouter la div avec la classe "box" à la div principale
    div.appendChild(box);

    // Ajouter la div principale à la page
    document.body.appendChild(div);

    let form = box.querySelector('form');
    form.onsubmit = (e)=>{
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/codepromo/update.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    // if(data!=="ok"){
                    //     eleve_fenetre(div);
                    //     Contenu(div_aff,'affichage');
                    // }
                    // else{
                    //     console.log("non");
                    // }
                }
            }
        };
        let formData = new FormData(form);
        xhr.send(formData);
    };


    quitterButton.onclick = () => {
        eleve_fenetre(div);
    }


}


function eleve_fenetre(div){
    document.body.style.overflow = "scroll";
    div.remove();
}


// getmarque("php/souscategory/getcategory.php").then((data)=>{
//     let option = `<option value="" disabled selected>Choisissez une sous Catégorie</option>`;
//     data.forEach(element => {

//         option += `<option value="${element['id']}">${element['name']}</option>`
        
//     });
//     souscategory.innerHTML = option;
// })



// form.onsubmit = (e)=>{
//     e.preventDefault();
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/produit/ajouter.php", true);
//     xhr.onload = () => {
//         if (xhr.readyState === XMLHttpRequest.DONE) {
//             if (xhr.status === 200) {
//                 let data = xhr.response;
//                 console.log(data);
//             }
//         }
//     };
//     let formData = new FormData(form);
//     xhr.send(formData);
// };


function ajouter_image(form){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/produit/ajouter_img.php", true);
    xhr.onload = () => {
         if (xhr.readyState === XMLHttpRequest.DONE) {
             if (xhr.status === 200) {
                let data = xhr.response;
                
             }
         }
    };
    let formData = new FormData(form);
    xhr.send(formData);
}


function liste_img(div,id){
    getmarque("php/produit/getproduit_img.php?id_produit="+id).then((data)=>{
        let imgs = ``;
        data.forEach(ele => {
            console.log(data);
    
            imgs += `<img class="image_desc" src="../imgs/Les_produit/product/products/${ele['title']}/${ele['src']}" alt="">`;
            
        });
        div.innerHTML = imgs;
    })
        
}



async function getmarque(url){

    try{
        let mydata = await fetch(url);
        return await mydata.json();
    }catch(err){
        return err;
    }
        

}