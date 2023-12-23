
let loginForm = document.querySelector(".my-form");

loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    err = document.querySelector('.err'),
    err_mesg = err.querySelector('p');

    let xhr = new XMLHttpRequest();
        xhr.open("POST", "phpFile/login.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {

                    let data = xhr.response;

                    
                    
                    
                    if(data.trim().toLowerCase()==="admin"){
                        location.href = 'admin/home.php';
                    }
                    else if(data.trim().toLowerCase()==="user"){
                        location.href = "index.php";
                    }
                    else{
                        err.classList.remove('none');
                        err.style.backgroundColor = "red";
                        err_mesg.textContent = data ;
                    
                        document.querySelector('svg').onclick = ()=>{
                            err.classList.add('none');
                        }
                    
                    }
                    
                }
            }
    };
    let formData = new FormData(loginForm);
    xhr.send(formData);
});


