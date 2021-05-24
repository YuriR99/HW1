function RimuoviPref(event){
    console.log(event.currentTarget.parentNode);
   let E = event.currentTarget.parentNode;
   let NH = event.currentTarget.parentNode.querySelector('h3').textContent;
   console.log(NH);
   P.removeChild(E);
   fetch("Elimina.php?NomeH="+NH);
   let contatore = P.querySelectorAll("#Pref_U div").length;
        if(contatore == 0){
            P.classList.add("N");
        }else{
            P.classList.remove("N");
        }
}
function main(json){
    for(let c of json){
    const W = document.createElement("div");
    W.setAttribute("class","PH");
    let D = document.createElement("h3");
    let Di = document.createTextNode(c.Nome_Hotel); 
    D.appendChild(Di);
    let R = document.createElement("a");
    R.setAttribute("class",'B');
    R.textContent = "Rimuovi";
    W.appendChild(D);
    W.appendChild(R);
    P.appendChild(W);
    R.addEventListener("click",RimuoviPref);
    }
    P.classList.remove("N");
}
function GuardaPreferiti(event){
    let contatore = P.querySelectorAll("#Pref_U div").length;
        if(contatore == 0){
            P.classList.add("N");
        }else{
            P.classList.remove("N");
        }
    event.currentTarget.textContent="Chiudi Preferiti";
    event.currentTarget.removeEventListener("click",GuardaPreferiti);
    event.currentTarget.addEventListener("click",ChiudiPref);
}
function ChiudiPref(event){
    P.classList.add("N");
    event.currentTarget.textContent="Preferiti";
    event.currentTarget.removeEventListener("click",ChiudiPref);
    event.currentTarget.addEventListener("click",GuardaPreferiti);

}
function onSuccess(response){
    return response.json()
}
function onError(error){
    console.log('Error' + error);
}
function onJson(json){
    console.log(json);
    main(json);
}
function Visualizza(event){
    event.preventDefault();
    fetch('Preferiti.php').then(onSuccess).then(onJson).then(onError);
    event.currentTarget.textContent="Chiudi Preferiti";
    event.currentTarget.removeEventListener("click",Visualizza);
    event.currentTarget.addEventListener("click",ChiudiPref);
}
const P = document.querySelector("#Pref_U");
document.querySelector('#Pref').addEventListener('click',Visualizza);
const B = document.querySelector('.B');