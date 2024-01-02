
let qunatity_div = document.querySelector('.quantite'),
mois = document.querySelector('.mois'),
plus = document.querySelector('.plus'),
resultat = document.querySelector('.res'),
authenticated_user = document.getElementById('authenticated_user');

console.log(mois);
console.log(plus);
console.log(resultat);

let max = qunatity_div.dataset.q;
let res = 0;

resultat.textContent = res;


plus.onclick = ()=>{
    if(res >= max){
        plus.classList.add('stop');
    }
    
    else{
        plus.classList.remove('stop');
        res++;
        resultat.textContent = res;
    }
    if(res > 0){
        mois.classList.remove('stop');
    }
}

mois.onclick = ()=>{
    console.log(mois);
    if(res < 1){
        mois.classList.add('stop');
    }
    else{
        mois.classList.remove('stop');
        res--;
        resultat.textContent = res;
    }
    if(res < 20){
        plus.classList.remove('stop');
    }
}


let colors = document.querySelectorAll('.color'),
size = document.querySelectorAll('.taille'),
btn_add = document.getElementById('add_panier');


colors.forEach((e)=>{
    e.onclick = ()=>{
        remove(colors,"chosir");
        e.classList.add('chosir');
        
    }
})


size.forEach((e)=>{
    e.onclick = ()=>{
        remove(size,"selected");
        e.classList.add('selected');
        
    }
})

btn_add.onclick = ()=>{
    let id_pro = btn_add.parentElement.dataset.id,
    id_color = document.querySelector('.chosir').dataset.id,
    id_size = document.querySelector('.selected').dataset.id,
    q = resultat.textContent ;

    let err = document.querySelector('.err'),
    err_mesg = err.querySelector('p');
    
    console.log(resultat.textContent);
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
    

}

function remove(e,classe){
    e.forEach((ele)=>{
        ele.classList.remove(classe);
    })
}
