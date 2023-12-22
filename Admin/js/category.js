const form = document.getElementById("add_codepromo"),
div_parent = document.querySelector('.contenu'),
div_aff = document.getElementById('project');


const filtre = document.getElementById('filtre'),
f_select = document.querySelector('select');


getmarque('php/category/getsexe.php').then((data)=>{
    let Options = "";
    data.forEach((e)=>{
        Options += `<option value="${e['sexe']}">${e['sexe']}</option>`;
    })
    f_select.innerHTML = Options;

    f_select.onchange = () =>{
        console.log(f_select.value);
        getmarque("php/category/getsexe.php?sexe="+f_select.value).then((data)=>{
            handler_category(div_aff,data);
        })
    }
    
})







Contenu(div_aff,"affichage");
function Contenu(div,val){
    if(val === "affichage"){
        div_aff.classList.add('courses-page');
        
        affichage(div_aff);
    }
    else{
        div_aff.classList.remove('courses-page');
        ajouter(div_aff);
    }
}

let Options = document.querySelectorAll(".tache_select div");
Options.forEach(e=>{
    e.addEventListener("click", () => {
        const dataType = e.getAttribute("data-type");
        removeSelected(Options);
        e.classList.add("selected");
        Contenu(div_aff,dataType);
        

    });
});

function handler_category(div,data){
    let cards = '';
    data.forEach((ele)=>{
        cards += `
        <div data-id=${ele['id']} class="course bg-white rad-6 p-relative">
            <img class="cover" src="../imgs/les_produit/category/${ele['img']}" alt="" />
            
            <div class="p-20">
                <h4 class="m-0">${ele['name']}</h4>
                <p class="description c-grey mt-15 fs-14">
                ${ele['description']}
                </p>
            </div>
            <span class="modifier">modifer</span>
            <span class="suprimer">suprimer</span>
            
            </div>
        `;
    })



    div.innerHTML = cards;
    let cards_divs = document.querySelectorAll(".course .modifier");
    // div.querySelector(".card-style .modifier").onclick = ()=>{
    //     modifier_produit(data,this);
    //     // console.log(this);
    //}
    console.log(cards_divs);
    cards_divs.forEach((ele)=>{
        ele.addEventListener("click", () => {
            //console.log(ele.parentElement.dataset.id);
            console.log("bouda");
            modifier_produit(data,ele.parentElement.dataset.id);
    
        });
    })
}

function affichage(div){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/Category/getCategory.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.response);
                handler_category(div,data);
                
                

            }
        }
    };
    xhr.send();

}


function ajouter(div){
    let form = document.getElementById('add_category'),
    fields = form.querySelectorAll("input,textarea"),
    err = document.querySelector('.err'),
    err_mesg = err.querySelector('p');

    form.onsubmit = (e)=>{
        console.log("bouda");
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/category/ajouter.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    err.classList.remove('none');
                    if(data === "ok"){
                        fields.forEach((e)=>{
                            e.value = "";
                        })
                        
                        
                        err.style.backgroundColor = "#327B32";
                        err_mesg.textContent = "le produit ajouter avec succes";
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
    };


}



function modifier_produit(data,ele_params){
    data.forEach((ele)=>{
        if(ele['id'] == ele_params){
            formule(ele);
        }
    })
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
    <form id="add_category" class="form-box px-3">
    <div class="form-input">
      <span><i class="fa fa-tag"></i></span>
      <input type="hidden" name="id" value="${ele['id']}">
      <input type="text" name="name" placeholder="Nom de la catégorie" value="${ele['name']}" required>
    </div>
  <div class="form-input">
      <span><i class="fa fa-tags"></i></span>
      <select name="sexe" required>
        <option value="" disabled selected>Sexe</option>
        <option value="home">Homme</option>
        <option value="feme">Femme</option>
        <option value="enfant">enfant</option>
        <option value="bebe">bebe</option>
      </select>
  </div>
  
  <div class="form-input">
      <span class="textariea"><i class="fa fa-info-circle"></i></span>
      <textarea name="description" placeholder="     Description de la catégorie" class="form-control" value="${ele['description']}" required></textarea>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-block text-uppercase">Ajouter Produit</button>
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
        xhr.open("POST", "php/category/update.php", true);
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


    quitterButton.onclick = () => {
        eleve_fenetre(div);
    }


}

function eleve_fenetre(div){
    document.body.style.overflow = "scroll";
    div.remove();
}









// form.onsubmit = (e)=>{
//     e.preventDefault();
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/codepromo/ajouter.php", true);
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

// let xhr = new XMLHttpRequest();
// xhr.open("POST", "php/sousCategory/getCategory.php", true);
// xhr.onload = () => {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//             const data = JSON.parse(xhr.response);
//             console.log(data);
//             console.log(data.length);
//         }
//     }
// };
// xhr.send();

// fields.forEach((e,index)=>{
//     if(e.value.length===0){
//         all_is_ok = false;
//         fields_err[index].textContent = "* this fields is requiered";
//         fields_err[index].style.display = "block";
//     }
//     else{
//         fields_err[index].style.display = "none";
//     }
// });

function removeSelected (div){
    div.forEach(e=>{
        e.classList.remove("selected");
    });
}


async function getmarque(url){

    try{
        let mydata = await fetch(url);
        return await mydata.json();
    }catch(err){
        return err;
    }
        

}




// const form = document.getElementById("add_category");


// form.onsubmit = (e)=>{
//     e.preventDefault();
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/Category/ajouter.php", true);
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

// let xhr = new XMLHttpRequest();
// xhr.open("POST", "php/Category/getCategory.php", true);
// xhr.onload = () => {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//             const data = JSON.parse(xhr.response);
//             console.log(data);
//             console.log(data.length);
//         }
//     }
// };
// xhr.send();

// fields.forEach((e,index)=>{
//     if(e.value.length===0){
//         all_is_ok = false;
//         fields_err[index].textContent = "* this fields is requiered";
//         fields_err[index].style.display = "block";
//     }
//     else{
//         fields_err[index].style.display = "none";
//     }
// });


