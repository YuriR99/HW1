function onSuccess(response){
    return response.json()
}
function onError(error){
    console.log('Error' + error);
}
function ID_H(json){
    for(let f of json){
        C_H = f.Codice;
    }
}
function onJson3(json){
    console.log(json);
    ID_H(json);
}
function Valutazioni(json){
    let Hv = document.createElement("div");
    Hv.setAttribute("class", "HV");
        const T1 = document.createElement("table");
        const TR2 = document.createElement("tr");
        const TD4 = document.createElement("td");
        const TD5 = document.createElement("td");
        const TD6 = document.createElement("td");
        TD4.textContent = 'Utente';
        TR2.appendChild(TD4);
        TD5.textContent = 'Hotel';
        TR2.appendChild(TD5);
        TD6.textContent = 'Voto';
        TR2.appendChild(TD6);
        T1.appendChild(TR2);
        for(let a of json){
        const TR3 = document.createElement("tr");
        const TD7 = document.createElement("td");
        const TD8 = document.createElement("td");
        const TD9 = document.createElement("td");
        TD7.textContent = a.Username;
        TR3.appendChild(TD7);
        TD8.textContent = a.Nome;
        TR3.appendChild(TD8);
        TD9.textContent = a.Voto;
        TR3.appendChild(TD9);
        T1.appendChild(TR3);
        Hv.appendChild(T1);
        }
        votU.appendChild(Hv);
}

function NascondiGif(){
    const J = document.querySelector("#Gif");
    J.classList.add("N");
}
function Invia_Voto(event){
    console.log(event.currentTarget.parentNode.querySelector("Input").value);
    event.currentTarget.parentNode.querySelector("img").classList.remove("N");
    let Vot = event.currentTarget.parentNode.querySelector("Input").value;
    console.log(C_H);
    setTimeout(NascondiGif,3000);
    fetch("Voto.php?Cod="+C_H+"&Voto="+Vot);
}
function Voto(event){
    DvO.innerHTML = "";
    console.log(event.currentTarget.parentNodo);
    let Ti = document.createElement("h1");
    Ti.textContent = event.currentTarget.textContent;
    N_H = event.currentTarget.textContent;
    fetch("ID_Hotel.php?Nome="+N_H).then(onSuccess).then(onJson3).then(onError);
    const Tex = document.createElement("h4");
    Tex.textContent = "Inserisci il tuo Voto";
    const Vo = document.createElement("Input");
    Vo.setAttribute("type","text");
    const PV = document.createElement("a");
    PV.textContent = "INVIA";
    const GIF = document.createElement("img");
    GIF.setAttribute("class","N");
    GIF.setAttribute("id","Gif");
    GIF.src = "ML.gif";
    DvO.appendChild(Ti);
    DvO.appendChild(Tex);
    DvO.appendChild(Vo);
    DvO.appendChild(PV);
    DvO.appendChild(GIF);
    V.appendChild(DvO);
    PV.addEventListener('click',Invia_Voto);
}

function Valutazione_Hotel(json){
        let Ho = document.createElement("div");
        Ho.setAttribute("class", "HV");
        const T = document.createElement("table");
        const TR = document.createElement("tr");
        const TD = document.createElement("td");
        const TD1 = document.createElement("td");
        TD.textContent = 'Nome';
        TR.appendChild(TD);
        TD1.textContent = 'Valutazione Media';
        TR.appendChild(TD1);
        T.appendChild(TR);
        for(let c of json){
        const TR1 = document.createElement("tr");
        let Ph = document.createElement("a");
        Ph.setAttribute("class","NomeH")
        const TD2 = document.createElement("td");
        const TD3 = document.createElement("td");
        Ph.textContent = c.Nome;
        TD2.appendChild(Ph);
        TR1.appendChild(TD2);
        TD3.textContent = c.Valutazione_Media;
        TR1.appendChild(TD3);
        T.appendChild(TR1);
        Ho.appendChild(T);
        Ph.addEventListener('click',Voto);
        }
        votH.appendChild(Ho);
}
function onJson(json){
    console.log(json);
    Valutazione_Hotel(json);
}

function onJson2(json){
    console.log(json);
    Valutazioni(json);
}

fetch('Valutazioni_Hotel.php').then(onSuccess).then(onJson).then(onError);
fetch('Voti_Utenti.php').then(onSuccess).then(onJson2).then(onError);

const votH = document.querySelector("#VotiH");
const votU = document.querySelector("#VotiU");
const V = document.querySelector('#voti');
let N_H;
let C_H;
const DvO = document.createElement('div');
DvO.setAttribute("id","VotazioneH");