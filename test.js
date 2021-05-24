function Nlogin(event){
    console.log(event.currentTarget);
    Log.classList.add("N");
    Reg.classList.remove("N");
    event.currentTarget.removeEventListener("click",Nlogin);
    pul2.addEventListener("click",login )
}

function login(event){
    Reg.classList.add("N");
    Log.classList.remove("N");
    event.currentTarget.removeEventListener("click", login);
    pulsante.addEventListener("click", Nlogin);
}

function main(){
    pulsante.addEventListener("click", Nlogin);
}
const Log = document.querySelector("#Log");
const Reg = document.querySelector("#Reg");
const pulsante = document.querySelector("#SI");
const pul2 = document.querySelector("#LO");
main();