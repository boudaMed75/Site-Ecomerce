
const form = document.querySelector("form"),
password = document.getElementById('password'),
conf_password = document.getElementById('conf_password'),
fields = form.querySelectorAll("input,textarea"),
err = document.querySelector('.err'),
err_mesg = err.querySelector('p');






form.onsubmit = (e)=>{
    e.preventDefault();
    console.log("bouda added user");
    if (password.value === conf_password.value){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "phpFile/seConnecter.php", true);
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
                        err_mesg.textContent = "Votre compte a ete creu avec succes ";
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
    else{
        err.classList.remove('none');
        err.style.backgroundColor = "red";
        err_mesg.textContent = "Confirmer Le mot de pass" ;
    }
    // all_input.forEach((e,index)=>{
    //     if(e.value.length===0){
    //         all_is_ok = false;
    //         err[index].textContent = "* this fields is requiered";
    //         err[index].style.display = "block";
           
    //     }
    //     else{
    //         err[index].style.display = "none";
    //     }
    // });
    // let xhr = new XMLHttpRequest();
    // xhr.open("POST", "phpFile/seConnecter.php", true);
    // xhr.onload = () => {
    //     if (xhr.readyState === XMLHttpRequest.DONE) {
    //         if (xhr.status === 200) {
    //             let data = xhr.response;
    //             console.log(data);
    //             // if(data==="ok"){
    //             //     mesage_succes.style.display = "flex";
    //             //     demande_title.value= "";
    //             //     demande_content.value = "";
    //             // }
                
    //         }
    //     }
    // };
    // let formData = new FormData(form);
    // xhr.send(formData);
};

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


