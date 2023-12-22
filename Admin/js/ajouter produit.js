const form = document.getElementById('add_product'),
marques = document.getElementById('marque'),
fields = form.querySelectorAll("input,textarea"),
    err = document.querySelector('.err'),
    err_mesg = err.querySelector('p'),
    coulors_div = document.getElementById('colors'),
    size_div = document.getElementById('size');

// const clors = document.querySelectorAll('.personalise');

// clors.forEach((e)=>{
//     e.onclick = ()=>{
//         e.classList.toggle('chosis');
//     }
// })

sexe = document.getElementById('sexe'),
cat = document.getElementById("cat");



getmarque('php/category/getsexe.php').then((data)=>{
    let sexe_options = '<option value="" disabled selected>Sexe</option>';
    data.forEach(e=>{
        sexe_options += `<option value="${e['sexe']}">${e['sexe']}</option>`
    })
    sexe.innerHTML = sexe_options;

})




sexe.onchange = ()=>{
    console.log(sexe.value);
    cat.classList.remove('d-none');
    let catoption = '';
    getmarque("php/sousCategory/getCategory.php?sexe="+sexe.value).then((data)=>{
        data.forEach((e)=>{
            catoption += `<option value="${e['id']}">${e['name']}</option>`;
        })
        cat.querySelector('select').innerHTML = catoption;

        
    }).catch(err=>{
        console.log(err);
    })
    

}


getmarque('php/produit/getcolors.php').then((data)=>{
    let col = '';
    data.forEach((e)=>{
        console.log(data);
        col += `
            <div class="">
                <input type="checkbox" name="colors[]" id="col${e['id']}" value="${e['id']}"/>
                <label for="col${e['id']}"><span style="background-color: ${e['name']};" class="personalise"></span></label>
            </div>
        `
    });
    coulors_div.innerHTML = col;
    const clors = coulors_div.querySelectorAll('.personalise');

    clors.forEach((e)=>{
        e.onclick = ()=>{
            e.classList.toggle('chosis');
        }
    })

})


getmarque('php/produit/getsize.php').then((data)=>{
    let col = '';
    console.log(data);
    data.forEach((e)=>{
        col += `
            <div class="">
                <input type="checkbox" name="sizes[]" id="size${e['id']}" value="${e['id']}"/>
                <label for="size${e['id']}"><span  class="personalise size">${e['name']}</span></label>
            </div>
        `
    });
    size_div.innerHTML = col;
    const clors = size_div.querySelectorAll('.personalise');

    clors.forEach((e)=>{
        e.onclick = ()=>{
            e.classList.toggle('chosis');
        }
    })

})

getmarque("php/marques/getmarque.php").then((data)=>{
    let option = `<option value="" disabled selected>Choisissez une Marque</option>`;
    data.forEach(element => {

        option += `<option value="${element['id']}">${element['name']}</option>`
        
    });
    marques.innerHTML = option;
})

// getmarque("php/souscategory/getcategory.php").then((data)=>{
//     let option = `<option value="" disabled selected>Choisissez une sous Catégorie</option>`;
//     data.forEach(element => {

//         option += `<option value="${element['id']}">${element['name']}</option>`
        
//     });
//     souscategory.innerHTML = option;
// })



form.onsubmit = (e)=>{
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/produit/ajouter.php", true);
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







async function getmarque(url){

    try{
        let mydata = await fetch(url);
        return await mydata.json();
    }catch(err){
        return "err";
    }
        

}