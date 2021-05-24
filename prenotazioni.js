function main(json){
    let Date = document.createElement("div");
    Date.setAttribute("class", "Date");
    let F = document.createElement("a");
    F.setAttribute("id","Fre");
    let Fi = document.createElement("img");
    Fi.src = "F.png";
    F.appendChild(Fi);
    let Ft = document.createElement("h3");
    Ft.textContent = "Più informazioni";
    F.appendChild(Ft);
    const T = document.createElement("table");
    const TR = document.createElement("tr");
    const TD = document.createElement("td");
    const TD1 = document.createElement("td");
    const TD2 = document.createElement("td");
    TD.textContent = 'Check IN';
    TR.appendChild(TD);
    TD1.textContent = 'Check OUT';
    TR.appendChild(TD1);
    TD2.textContent = 'Stato';
    TR.appendChild(TD2);
    T.appendChild(TR);
    for(let c of json){
    const TR1 = document.createElement("tr");
    const TD3 = document.createElement("td");
    const TD4 = document.createElement("td");
    const TD5 = document.createElement("td");
    TD3.textContent = c.Data_Check_In;
    TR1.appendChild(TD3);
    TD4.textContent = c.Data_Check_Out;
    TR1.appendChild(TD4);
    TD5.textContent = c.Tipo;
    TR1.appendChild(TD5);
    T.appendChild(TR1);
    }
    Date.appendChild(T);
    Date.appendChild(F);
    P.appendChild(Date);

    F.addEventListener('click',Piu_Inf);

}

function main2(json){
    const DateP = document.createElement("div");
    DateP.setAttribute("id","DateP");
    const T = document.createElement("table");
    const TR = document.createElement("tr");
    const TD = document.createElement("td");
    const TD1 = document.createElement("td");
    const TD2 = document.createElement("td");
    const TD3 = document.createElement("td");
    const TD4 = document.createElement("td");
    const TD5 = document.createElement("td");
    const TD6 = document.createElement("td");
    TD.textContent = 'Hotel';
    TR.appendChild(TD);
    TD1.textContent = 'Città';
    TR.appendChild(TD1);
    TD2.textContent = 'Stelle';
    TR.appendChild(TD2);
    TD3.textContent = 'Check IN';
    TR.appendChild(TD3);
    TD4.textContent = 'Check OUT';
    TR.appendChild(TD4);
    TD5.textContent = 'Camera';
    TR.appendChild(TD5);
    T.appendChild(TR);
    for(let c of json){
        const TR1 = document.createElement("tr");
        const TD7 = document.createElement("td");
        const TD8 = document.createElement("td");
        const TD9 = document.createElement("td");
        const TD10 = document.createElement("td");
        const TD11 = document.createElement("td");
        const TD12 = document.createElement("td");
        const TD13 = document.createElement("td");
        TD7.textContent = c.Nome;
        TR1.appendChild(TD7);
        TD8.textContent = c.Citt\u00e0;
        TR1.appendChild(TD8);
        TD9.textContent = c.Stelle;
        TR1.appendChild(TD9);
        TD10.textContent = c.Data_Check_In;
        TR1.appendChild(TD10);
        TD11.textContent = c.Data_Check_Out;
        TR1.appendChild(TD11);
        TD12.textContent = c.Tipo;
        TR1.appendChild(TD12);
        T.appendChild(TR1);
        }
        DateP.appendChild(T);
        P.appendChild(DateP);
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

fetch('Prenotazioni_Utente.php').then(onSuccess).then(onJson).then(onError);

function onJson2(json){
    console.log(json);
    main2(json);
}
function Piu_Inf2(event){
    console.log(event.currentTarget);
    event.currentTarget.querySelector("h3").textContent = "Meno Informazioni";
    event.currentTarget.querySelector("img").src = "FG.png";
    document.querySelector("#DateP").classList.remove("N");
    event.currentTarget.removeEventListener('click',Piu_Inf2);
    event.currentTarget.addEventListener('click',Meno_Inf);
}
function Meno_Inf(event){
    event.currentTarget.querySelector("h3").textContent = "Più informazioni";
    event.currentTarget.querySelector("img").src = "F.png";
    event.currentTarget.removeEventListener('click',Meno_Inf);
    event.currentTarget.addEventListener('click',Piu_Inf2);
    document.querySelector("#DateP").classList.add("N");
}

function Piu_Inf(event){
    console.log(event.currentTarget);
    event.currentTarget.querySelector("h3").textContent = "Meno Informazioni";
    event.currentTarget.querySelector("img").src = "FG.png";
    fetch("Piu_Inf.php").then(onSuccess).then(onJson2).then(onError);
    event.currentTarget.removeEventListener('click',Piu_Inf);
    event.currentTarget.addEventListener('click',Meno_Inf);
}


const P = document.querySelector('#Prenotazioni');

