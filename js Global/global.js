
const notification_btn = document.querySelector(".notifications"),
personnal_btn = document.querySelector(".profile"),
notification_div = document.querySelector(".click1"),
personnal_div = document.querySelector(".click2");
const forme_mobile_btn = document.querySelector(".remove-btn");

forme_mobile_btn.addEventListener("click",()=>{
    document.body.classList.toggle("collapsed");
    
})

console.log(notification_btn);
console.log(notification_div);

notification_btn.addEventListener('click',()=>{
    notification_div.classList.remove("none");
    notification_div.classList.toggle("hiden");
})
personnal_btn.addEventListener('click',()=>{
    personnal_div.classList.remove("none");
    personnal_div.classList.toggle("hiden");
})

document.addEventListener('click',(event)=>{
    if(!notification_btn.contains(event.target) && !notification_div.contains(event.target)){
        notification_div.classList.add('hiden');
        notification_div.classList.add('ntf--fade-in');
    }
    if(!personnal_btn.contains(event.target) && !personnal_div.contains(event.target)){
        personnal_div.classList.add('hiden');
        personnal_div.classList.add('ntf--fade-in');
    }
    
})
