const form = document.getElementById("add_codepromo"),
div_parent = document.querySelector('.contenu'),
div_aff = document.getElementById('project');




Contenu(div_aff,"affichage");
function Contenu(div,val){
    if(val === "affichage"){
        div_aff.classList.add('aff');
        
        affichage(div_aff);
    }
    else{
        div_aff.classList.remove('aff');
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



function affichage(div){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/CodePromo/get.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.response);
               
                let cards = '';
                data.forEach((ele)=>{
                    cards += `
                    <div data-id =" ${ele['id']}" class="card-style">
                        <h3>${ele['name']}</h3>
                        <p>${ele['date_debut']}</p>
                        <p>${ele['expiredAt']}</p>
                        <p>${ele['sold']}</p>
                        <span class="modifier">modifer</span>
                        <span class="suprimer">suprimer</span>
                    </div>
                    `;
                })



                div.innerHTML = cards;
                let cards_divs = document.querySelectorAll(".card-style .modifier");
                // div.querySelector(".card-style .modifier").onclick = ()=>{
                //     modifier_produit(data,this);
                //     // console.log(this);
                //}
                console.log(cards_divs);
                cards_divs.forEach((ele)=>{
                    ele.addEventListener("click", () => {
                        //console.log(ele.parentElement.dataset.id);
                        modifier_produit(data,ele.parentElement.dataset.id);
                
                    });
                })
                

            }
        }
    };
    xhr.send();

}


function ajouter(div){
    div.innerHTML = `
    <div class="contenu">
    <div class="card-body">
        <h4 class="title text-center mt-4">Ajout de Code Promo</h4>
        <form id="add_codepromo" class="form-box px-3">
            <div class="form-input">
              <span><i class="fa fa-ticket"></i></span>
              <input type="text" name="name" placeholder="Code Promo" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-calendar"></i></span>
              <input type="date" name="promoStartDa" placeholder="Date de début" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-calendar"></i></span>
              <input type="date" name="promoEndDate" placeholder="Date de fin" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-percent"></i></span>
              <input type="number" name="promoPercentage" placeholder="Pourcentage de Réduction" required>
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-block text-uppercase">Ajouter Code Promo</button>
            </div>
        </form>
      </div>
    </div>
  </div>
    `;
    let form = document.getElementById('add_codepromo');

    form.onsubmit = (e)=>{
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/codepromo/ajouter.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
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


